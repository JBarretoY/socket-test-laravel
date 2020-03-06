$(document).ready(function(){
    var input  = document.querySelector("#phone");
    var input1 = document.querySelector("#phone_com");
    
    intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function(success, failure) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                success(countryCode);
            });
        }
    });

    intlTelInput(input1, {
        initialCountry: "auto",
        geoIpLookup: function(success, failure) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                success(countryCode);
            });
        }
    });

    // $('#password').password({
    //     shortPass: 'La contraseña es muy corta',
    //     badPass: 'Debil, intente combinar numeros y letras',
    //     goodPass: 'Medio, intente combinar caracteres especiales',
    //     strongPass: 'Contraseña fuerte',
    //     containsField: 'la contraseña contiene su nombre',
    //     enterPass: 'Escriba su contraseña',
    //     showPercent: false,
    //     showText: true, // shows the text tips
    //     animate: true, // whether or not to animate the progress bar on input blur/focus
    //     animateSpeed: 'fast', // the above animation speed
    //     field: false, // select the match field (selector or jQuery instance) for better password checks
    //     fieldPartialMatch: true, // whether to check for partials in field
    //     minimumLength: 4 // minimum password length (below this threshold, the score is 0)
    // });

    // $("#form-regis-client").validate();

    // $(document).on("submit","#form-regis-client",function(e){
    //     e.preventDefault();
    //     $("#form1").hide();
    //     $("#form2").show();
    //     $("#button-wbi1Ws").hide();
    //     $("#button-back").show();
    //     $("#button-end-re").show();

    // });

    // $(document).on('click','#button-end-re',function(){

    //     saveRegisterClient(
    //         $("#name").val(),
    //         $("#lastname").val(),
    //         $("#email").val(),
    //         $("#profession").val(),
    //         $("#user").val(),
    //         $("#password").val(),
    //         $("#phone").val(),
    //         $("#name_com").val(),
    //         $("#cantidadMediai").val(),
    //         $("#act_com").val(),
    //         $("#email_com").val(),
    //         $("#phone_com").val(),
    //         $("#cant_con").val(),
    //         $("#type_es").val(),
    //         $("#nom_repre").val()
    //     );
    // });

    // $(document).on("click","#button-back",function(){
    //     $("#form1").show();
    //     $("#form2").hide();
    //     $("#button-end-re").hide();
    //     $("#button-wbi1Ws").show();
    //     $("#button-back").hide();
    // });

    $('#switch').click(function(){
        console.log('con');
        var status = !$('#fre-switch-user-available').is(':checked');
        updateEnable(status);
    });

    $("#uppass").click(function(){
        var oldpass = $("#old_password").val();
        var newpass = $("#new_password").val();
        var renew   = $("#renew_password").val();

        if(newpass === renew){
            changePassword(oldpass,newpass);
        }else{
            alert("Las contrasenas no coinciden");
        }
    });
});

function saveRegisterClient(name,lastname,email,profession,user,password,phone,companyName,numEmp,descryp,emailCom,phoneCom,numCon,typeSpe,name_repre){
    $.ajax({
        url:'/user/store',
        type:'POST',
        data:{
            name:name,
            lastname:lastname,
            email:email,
            phone:phone,
            type:3,
            profession:profession,
            username:user,
            password:password,
            company_name:companyName,
            count_personal:numEmp,
            industry:descryp,
            company_email:emailCom,
            company_phone:phoneCom,
            specialist_needed:numCon,
            specialist_type:typeSpe,
            agent:name_repre,
            _token:$("#token").val()
        },
        beforeSend:function(data){
            $("#button-end-re").attr('disable',true);
        },
        success:function(data){
            alert("cliente registrado");
        },
        error:function(data){
            alert('ocurrio un error');
        }
    });
}

function updateEnable(status){
    if(status){
        $.ajax({
            url:'/user/change-status/'+status,
            type:'PATCH',
            data:{
                _token:$("#token").val()
            },
            success:function(data){
                if(data == 200){
                    console.log('status changed');
                }
            }
        });
    }
}

function changePassword(oldPassword,newPassword){
    $.ajax({
        url:'user/updatepass',
        type:'PATCH',
        data:{
            'old_pass':oldPassword,
            'new_pass':newPassword,
            '_token':$("#token").val()
        },
        success:function(data){
            if( data['status'] == 200 )
                alert("Password Cambiado existosamente");
        },
        error:function(data){
            if(data.responseJSON.code == 400)
                alert(data.responseJSON.error);
        }
    });
}
