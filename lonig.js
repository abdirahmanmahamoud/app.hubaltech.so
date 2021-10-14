$('#form').submit(function (event) { 
    event.preventDefault();
    let username = $('#username').val();
    let password = $('#password').val();
    let send = {
        'username' : username,
        'password' : password,
        'action' : 'lonig'
    }
    $.ajax({
        method : 'POST',
        dataType : 'JSON',
        url :  'lonig.php',
        data :  send,
        success : function(data){
          let status = data.status;
          let per = data.data;
          abdi(status,per);
        },
        error : function(data){
        abdi(status,per);
        },
     })
 })
 function abdi(status,message){
    let success =  document.querySelector('.alert-success');
    let error =  document.querySelector('.alert-error');
    if(status == true){
        window.location.href = 'des/dashboard.php';
    }else if(status == false){
       success.classList = 'alert alert-danger ';
       success.innerHTML = message;
       $('#password').val('');
   }
 }