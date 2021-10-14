$('#fromdate').attr('disabled',true);
$('#todate').attr('disabled',true);

$('#type').on('change',function(){
    if($('#type').val() == 0){
        $('#fromdate').attr('disabled',true);
        $('#todate').attr('disabled',true);
    }else{
        $('#fromdate').attr('disabled',false);
        $('#todate').attr('disabled',false);
    }
})
$('#addprint').on('click',function(){
  print();
})

function print(){
  let print_table = document.querySelector('#print_table');
  let newwindow = window.open('');
  newwindow.document.write(`<html><head><title></title>`);
  newwindow.document.write(`<style media='print'>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap');
  body{
      font-family: 'Poppins', sans-serif;
  }
  table{
      width: 100%;
  }
  th{
    background-color: #F15D22;
    color: #fff;
}
th, td{
  padding: 5px;
  text-align: left;
}
th, td{
  border-bottom: 1px solid #2B2E83;
}
  
  </style>`); 
  newwindow.document.write(`</head> <body>`);
  newwindow.document.write(print_table.innerHTML);
  newwindow.document.write(`<body></html>`); 
  newwindow.print();
  newwindow.close();
}
$('#form').submit(function (event) { 
    event.preventDefault();
    let fromdate = $('#fromdate').val();
    let todate = $('#todate').val();

    let send ={
      'fromdate' : fromdate,
      'todate' : todate,
      'action' : 'user_expense',
    }
    $('#table tr').html('');
    $.ajax({
      method : 'POST',
      dataType : 'JSON',
      url :  '../apl/apl.php',
      data :  send,
      success : function(data){
        let status = data.status;
        let per = data.data;
        let html = '';
        let tr = '';
        let th = '';
        if(status){
          per.forEach(item =>{
            th = '<tr>';
            for(let i in item){
               th += `<th>${i}</th>`;
             }
             th += '</tr>';

             tr += '<tr>';
             for(let i in item){
                tr += `<td>${item [i]}</td>`;
              }
              tr += '</tr>';
            })
            $('#table thead').append(th);
            $('#table tbody').append(tr);
       }
      },
      error : function(data){
        console.log(per)
      },
   })
 })