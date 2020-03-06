function ocultar(id){
    if (id == 1) {
        document.getElementById('cnt-profile-default').style.display = 'none';
        document.getElementById('ctn-edit-profile').style.display = 'block';
    } else if( id == 2) {
        document.getElementById('cnt-account-default').style.display = 'none';
        document.getElementById('ctn-edit-account').style.display = 'block';
    } else if(id == 3){
        document.getElementById('fre-empty-experience').style.display = 'none';
        document.getElementById('ctn-edit-experience').style.display = 'block';
    } else if(id == 4){
        document.getElementById('fre-empty-certification').style.display = 'none';
        document.getElementById('ctn-edit-certification').style.display = 'block';
    }else{
        document.getElementById('fre-empty-education').style.display = 'none';
        document.getElementById('ctn-edit-education').style.display = 'block';
    }
 
    }

function mostrar(id){
    if (id == 1) {
        document.getElementById('cnt-profile-default').style.display = 'block';
        document.getElementById('ctn-edit-profile').style.display = 'none';
    } else if(id == 2) {
        document.getElementById('cnt-account-default').style.display = 'block';
        document.getElementById('ctn-edit-account').style.display = 'none';
    } else if(id == 3){
        document.getElementById('fre-empty-experience').style.display = 'block';
        document.getElementById('ctn-edit-experience').style.display = 'none';
    } else if(id == 4){
        document.getElementById('fre-empty-certification').style.display = 'block';
        document.getElementById('ctn-edit-certification').style.display = 'none';
    }else{
        document.getElementById('fre-empty-education').style.display = 'block';
        document.getElementById('ctn-edit-education').style.display = 'none';
    }
  
    }
    // $(".chosen-select").chosen();