updatepage();
all();
 function updatepage(){
    $('#modal2').modal('show');
    let fileimage = document.querySelector('#image');
    let show = document.querySelector('#show');
 
    const reader = new FileReader();
    fileimage.addEventListener('change', (e) =>{
       const sf = e.target.files[0];
       reader.readAsDataURL(sf);
    })
    reader.onload = e =>{
       show.src = e.target.result;
    }
 }
 $('#form').submit(function (event) { 
    event.preventDefault();
    let form_data = new FormData($('#form')[0]);
    form_data.append('image',$('input[type=file]')[0].files[0]);
       form_data.append('action','update_user')
 
    $.ajax({
       method : 'POST',
       dataType : 'JSON',
       url :  '../apl/update.php',
       data :  form_data,
       processData : false,
       contentType : false,
       success : function(data){
         let status = data.status;
         let per = data.data;
         alert(per)
         window.location.href = '../des/logout.php';
       },
       error : function(data){
          abdi(status,per);
       },
    })
 })
 function all(id){
    let send ={
       'action' :  'all',
    }
    $.ajax({
       method : 'POST',
       dataType : 'JSON',
       url :  '../apl/update.php',
       data :  send,
       success : function(data){
          let status = data.status;
          let per = data.data;
          let html ='';
          let tr = '';
          if(status){
            $('#magaca_koobad').val(per[0].magaca_koobad); 
            $('#magaca_labaad').val(per[0].magaca_labaad); 
            $('#username').val(per[0].username);
            $('#password').val(per[0].password);
            $('#show').attr('src',`../images/${(per[0].image)}`);
            $('#modal2').modal('show');
          }
        },
        error : function(data){
           console.log(data);
        },
    })
 }
 $('#x').click(function(){
    window.location.href = '../des/dashboard.php';
 })
 
 $('#butt').click(function(){
    window.location.href = '../des/dashboard.php';
 })