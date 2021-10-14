ler()
$('#add').click(function(){
   $('#modal').modal('show')
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
   })
let btn = 'insert';

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

$('#form').submit(function (event) { 
   event.preventDefault();
   let form_data = new FormData($('#form')[0]);
   form_data.append('image',$('input[type=file]')[0].files[0]);
   if(btn == 'insert'){
      form_data.append('action','reg');
   }else{
      form_data.append('action','update_user')
   }

   $.ajax({
      method : 'POST',
      dataType : 'JSON',
      url :  '../apl/user.php',
      data :  form_data,
      processData : false,
      contentType : false,
      success : function(data){
        let status = data.status;
        let per = data.data;
        btn = 'insert';
        abdi(status,per);
      },
      error : function(data){
         abdi(status,per);
      },
   })
})

function ler(){
   $('#table tbody').html('');
   let send ={
      'action' :  'khar'
   }
   $.ajax({
      method : 'POST',
      dataType : 'JSON',
      url :  '../apl/user.php',
      data :  send,
      success : function(data){
         let status = data.status;
         let per = data.data;
         let html ='';
         let tr = '';
         if(status){
            per.forEach(item =>{
               tr += '<tr>';
               for(let i in item){
                  if(i == 'image'){
                     tr += `<td><img src="../images/${item [i]}"id='images'></td>`;
                  }else{
                     tr += `<td>${item [i]}</td>`;  
                  }
               }
               tr += `<td><a  class="btn btn-primary update_info text-white" update_id = ${item['id']}><i class="fas fa-edit"></i></a><a class="ml-2"></a> <a class="btn btn-danger delete_info text-white" delete_id = ${item['id']}><i class="fas fa-trash"></i></a></td>`;
               tr += '</tr>';
            })
            $('#table tbody').append(tr);
         }
       },
       error : function(data){
          console.log(data);
       },
   })
}

function all(id){
   let send ={
      'action' :  'all',
      'id' :  id,
   }
   $.ajax({
      method : 'POST',
      dataType : 'JSON',
      url :  '../apl/user.php',
      data :  send,
      success : function(data){
         let status = data.status;
         let per = data.data;
         let html ='';
         let tr = '';
         if(status){
            $('#username').val(per[0].username);
            $('#password').val(per[0].password);
            $('#id').val(per[0].id);
            $('#show').attr('src',`../images/${(per[0].image)}`);
            $('#modal').modal('show');
            btn = 'update';
         }
       },
       error : function(data){
          console.log(data);
       },
   })
}

function dele(id){
   let send ={
      'action' :  'delete',
      'id' :  id,
   }
   $.ajax({
      method : 'POST',
      dataType : 'JSON',
      url :  '../apl/user.php',
      data :  send,
      success : function(data){
         let status = data.status;
         let per = data.data;
         let html ='';
         let tr = '';
         if(status){
            let status = data.status;
            let per = data.data;
            ler();
            swal("", per, "success");
         }
       },
       error : function(data){
         swal("", per, "success");
       },
   })
}
function abdi(status,message){
   let success =  document.querySelector('.alert-success');
   let error =  document.querySelector('.alert-error');
   if(status == true){
      success.classList = 'alert alert-danger d-none ';
      success.classList = 'alert alert-success ';
      success.innerHTML = message;
      setTimeout(function(){
         ler();
         $('#modal').modal('hide');
         let show = document.querySelector('#fshow');
         let im = `<img id="show">`;
         show.innerHTML = im;
         success.classList = 'alert alert-success d-none';
         $('#form')[0].reset();
         $('#image').reset();
      },3000)

   }else if(status == false){
      error.classList = 'alert alert-danger ';
      error.innerHTML = message;
      $('#x').click(function(){
         $('#form')[0].reset();
         error.classList = 'alert alert-danger d-none ';
      })
  }
}
$('#x').click(function(){
   $('#form')[0].reset();
   let show = document.querySelector('#fshow');
   let im = `<img id="show">`;
   show.innerHTML = im;

})

$('#butt').click(function(){
   $('#form')[0].reset();
   let show = document.querySelector('#fshow');
   let im = `<img id="show">`;
   show.innerHTML = im;

})

$('#table').on("click",'a.update_info',function(){
   let id = $(this).attr('update_id');
   all(id);
})
$('#table').on("click",'a.delete_info',function(){
   let id = $(this).attr('delete_id');
     dele(id);
})