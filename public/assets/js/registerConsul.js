$(document).ready(function(){
    var input = document.querySelector("#phone");

    intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function(success, failure) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                success(countryCode);
            });
        }
    });

    $("#form_cons").validate();

    $("#form_cons").submit(function(e){
        e.preventDefault();
        saveNewConsul($("#name").val(),$("#lastname").val(),$("#email").val(),$("#user").val(),$("#password").val(),$("#phone").val());
    });
});

function saveNewConsul(name,lastname,email,user,password,phone){
    $.ajax({
        url:'/user/store',
        type:'POST',
        data:{
            name:name,
            lastname:lastname,
            email:email,
            type:4,
            username:user,
            password:password,
            phone:phone,
            _token:$("#token").val()
        },
        beforeSend:function (data) {
            $("#button-wbi1Ws").attr('disable',true);
        },
        success:function(data){
            alert("Consultor guardado exitosamente");
        },
        error:function(data){
            alert("ha acurrido un error");
        }
    });
}
