ler();
user();
$('#all').on('change',function(){
    if($(this).is(':checked')){
       $('input[type="checkbox"]').prop('checked',true);
    }else{
        $('input[type="checkbox"]').prop('checked',false);
    }
})

$('#rowall').on('change','input[name="role[]"]',function(){
    let value = $(this).val();
    if($(this).is(':checked')){
        $(`#rowall input[type="checkbox"][role="${value}"]`).prop('checked',true);
     }else{
        $(`#rowall input[type="checkbox"][role="${value}"]`).prop('checked',false);
     }
})

$('#rowall').on('change','input[name="link[]"]',function(){
    let value = $(this).val();
    if($(this).is(':checked')){
        $(`#rowall input[type="checkbox"][name_link="${value}"]`).prop('checked',true);
     }else{
        $(`#rowall input[type="checkbox"][name_link="${value}"]`).prop('checked',false);
     }
})

$('#formuser').submit(function (event) { 
   event.preventDefault();
   let user = $('#user').val();
   let actions = [];
   if(user == 0){
      alert('dooro user');
      return;
   }
   $('input[name="actions[]"').each(function(){
      if($(this).is(':checked')){
         actions.push($(this).val());
      }
   })
   let send ={
      'user_id' : user,
      'action_id' : actions,
      'action' : 'reg',
    }
 $.ajax({
      method : 'POST',
      dataType : 'JSON',
      url :  '../apl/user_authority.php',
      data :  send,
      success : function(data){
        let status = data.status;
        let per = data.data;
        alert(per);
      },
      error : function(data){
        alert(per);
      },
   })
})
$('#user').on('change',function(){
   let value = $(this).val();
   userler(value);
})

function userler(id){
   let send ={
      'action' :  'user_authority',
      'user_id' : id
   }
   $.ajax({
      method : 'POST',
      dataType : 'JSON',
      url :  '../apl/user_authority.php',
      data :  send,
      success : function(data){
         let status = data.status;
         let per = data.data;
         let html ='';
         if(status){
            if(per.length >= 1){
               per.forEach(item =>{
                  $(`input[type="checkbox"][name='role[]'][value='${item['role']}']`).prop('checked',true);
                  $(`input[type="checkbox"][name='link[]'][value='${item['link_name']}']`).prop('checked',true);
                  $(`input[type="checkbox"][name='actions[]'][value='${item['action_id']}']`).prop('checked',true);
            })
            }else{
               $('input[type="checkbox"]').prop('checked',false);
           }
         }
       },
       error : function(data){
          console.log(data);
       },
   })
}


function user(){
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
          if(status){
             per.forEach(item =>{
                   html += `<option value="${item['id']}">${item['username']}</option>`;
             })
             $('#user').append(html);
            }
        },
        error : function(data){
           console.log(data);
        },
    })
 }

function ler(){
    let send ={
       'action' :  'khar'
    }
    $.ajax({
       method : 'POST',
       dataType : 'JSON',
       url :  '../apl/user_authority.php',
       data :  send,
       success : function(data){
          let status = data.status;
          let per = data.data;
          let html ='';
          let role = '';
          let system_link = '';
          let system_action = '';
          if(status){
             per.forEach(item =>{
                for(let i in item){
                  if(item['role'] !== role){
                      html +=`
                      </fieldset>
                      </div>
                      </div>
                      <div class="col-sm-4">
                        <fieldset class="authority">
                            <legend class="authority">
                            <input type="checkbox" id="role" name="role[]" value="${item['role']}" class="mr-1">
                            ${item['role']}
                            </legend>
                      `;
                      role = item['role'];
                  }
                  if(item['name_link'] !== system_link){
                      html += `
                      <div class="control-group">
                        <label class="control-label">
                            <input type="checkbox" name="link[]" id="" value="${item['name_link']}" role = '${item['role']}' name = '${item['name']}'id = '${item['id']}'>
                            ${item['name_link']}
                        </label>
                      `;
                      system_link = item['name_link'];
                  }

                  if(item['name_action'] !== system_action){
                      html += `
                      <div class="system_action">
                        <label class="control-label ">
                            <input type="checkbox" name="actions[]" id="" style='margin-left: 25px;' value="${item['action_id']}" role = '${item['role']}' name = '${item['name']}'id = '${item['id']}'action_id = '${item['action_id']}' name_link ='${item['name_link']}'>
                            ${item['name_action']}
                        </label>
                        </div>
                      `;
                      system_action = item['name_action'];
                  }
                }
             })
             $('#rowall').append(html);
          }
        },
        error : function(data){
           console.log(data);
        },
    })
 }