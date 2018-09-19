<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Multiple Inline Insert into Mysql using Ajax JQuery in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container-fluid">
   <br />
   <h2 align="center">Dynamic table.</h2>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="20%">Question</th>
      <th width="10%">Option 1</th>
      <th width="10%">Option 2</th>
      <th width="10%">Option 3</th>
      <th width="10%">Option 4</th>
      <th width="10%">Currect Answer</th>
      <th width="25%">Explaination</th>
      <th width="5%"></th>
     </tr>
     <tr>
      <td contenteditable="true" class="quiz_question"></td>
      <td contenteditable="true" class="quiz_opt1"></td>
      <td contenteditable="true" class="quiz_opt2"></td>
      <td contenteditable="true" class="quiz_opt3"></td>
      <td contenteditable="true" class="quiz_opt4"></td>
      <td contenteditable="true" class="quiz_c_ans"></td>
      <td contenteditable="true" class="quiz_explan"></td>
      <td></td>
     </tr>
    </table>
    <div align="right">
     <!-- <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button> -->
     <select id="addItem" name="addItem" class="form-control">
        <option value="">-- Select Number of row --</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
    </div>
    <div align="center">
     <button type="button" name="save" id="save" class="btn btn-info">Save</button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div>
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('#addItem').change(function(){
    var num = $('#addItem :selected').val();

  for(var count = 1; count <= num ; count++){
    var html_code = "<tr id='row"+count+"'>";
     html_code += "<td contenteditable='true' class='quiz_question'></td>";
     html_code += "<td contenteditable='true' class='quiz_opt1'></td>";
     html_code += "<td contenteditable='true' class='quiz_opt2'></td>";
     html_code += "<td contenteditable='true' class='quiz_opt3' ></td>";
     html_code += "<td contenteditable='true' class='quiz_opt4' ></td>";
     html_code += "<td contenteditable='true' class='quiz_c_ans' ></td>";
     html_code += "<td contenteditable='true' class='quiz_explan' ></td>";
     html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
     html_code += "</tr>"; 
     $('#crud_table').append(html_code); 
  }
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var quiz_question = [];
  var quiz_opt1 = [];
  var quiz_opt2 = [];
  var quiz_opt3 = [];
  var quiz_opt4 = [];
  var quiz_c_ans = [];
  var quiz_explan = [];
  $('.quiz_question').each(function(){
   quiz_question.push($(this).text());
  });
  $('.quiz_opt1').each(function(){
   quiz_opt1.push($(this).text());
  });
  $('.quiz_opt2').each(function(){
   quiz_opt2.push($(this).text());
  });
  $('.quiz_opt3').each(function(){
   quiz_opt3.push($(this).text());
  });
  $('.quiz_opt4').each(function(){
   quiz_opt4.push($(this).text());
  });
  $('.quiz_c_ans').each(function(){
   quiz_c_ans.push($(this).text());
  });
  $('.quiz_explan').each(function(){
   quiz_explan.push($(this).text());
  });
  $.ajax({
   url:"validate.php",
   method:"POST",
   data:{
    quiz_question:quiz_question, 
    quiz_opt1:quiz_opt1, 
    quiz_opt2:quiz_opt2, 
    quiz_opt3:quiz_opt3,
    quiz_opt4:quiz_opt4,
    quiz_c_ans:quiz_c_ans,
    quiz_explan:quiz_explan
  },
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });
 
 function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();
 
});
</script>