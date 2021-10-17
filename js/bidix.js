menu();

setTimeout(function(){
    document.querySelectorAll('.nav-item').forEach(item =>{
        item.addEventListener('click',() =>{
            item.classList.toggle('pcoded-trigger');
            item.querySelector('.pcoded-submenu').classList.toggle('show-menu-now'); 
        })
    })
},2000);

function menu(){
    let send ={
       'action' :  'user_menu',
    }
    $.ajax({
       method : 'POST',
       dataType : 'JSON',
       url :  '../apl/user_authority.php',
       data :  send,
       success : function(data){
          let status = data.status;
          let per = data.data;
          let menu ='';
          let cat = '';
          if(status){
                per.forEach(menus =>{
                   if(menus['category_name'] !== cat){
                      if(cat !==''){
                         menu += `</ul></li></div>`;
                      }
                      menu += `
                      <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                      <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="fa ${menus['icon']}"></i></span><span class="pcoded-mtext">${menus['category_name']}</span></a>
                      <ul class="pcoded-submenu">
                      `;
                      cat = menus['category_name'];
                   }
                   menu +=`
                   <div class ='me'>
                   <li class="m"><a href="${menus['link']}" page='${menus['name']}' class="">${menus['link_name']}</a></li>

                   `;
                })  
             }
             $('#menu').append(menu);
         ///    let href = window.location.href.split('/');
            // let url = href[href.length-1];
            // let page = document.querySelector(`[page='${url}']`);
            // page.classList = 'active';
            // page.parentElement.classList.toggle('.show-menu-now')
        },
        error : function(data){
           console.log(data);
        },
    })
 }