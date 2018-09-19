<?php
//fetch.php
$connect = new mysqli("localhost", "root", "", "dynamic");
$output = '';
$query = "SELECT * FROM quiz ORDER BY id DESC";
$result = $connect->query($query);
$output = '
<br />
<h3 align="center">Question</h3>
<table class="table table-bordered" id="crud_table">
 <tr>
  <th width="25%">Question</th>
  <th width="10%">Option 1</th>
  <th width="10%">Option 2</th>
  <th width="10%">Option 3</th>
  <th width="10%">Option 4</th>
  <th width="10%">Currect Answer</th>
  <th width="25%">Explaination</th>
 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["question"].'</td>
  <td>'.$row["option1"].'</td>
  <td>'.$row["option2"].'</td>
  <td>'.$row["option3"].'</td>
  <td>'.$row["option4"].'</td>
  <td>'.$row["correct_answer"].'</td>
  <td>'.$row["explains"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>