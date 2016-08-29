<?php 

if(isset($_POST['first']) && isset($_POST['second'])){
$number = $_POST['first'];
$number2 = $_POST['second'];
$operator = (isset($_POST['operator']) ? $_POST['operator'] : null);

  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

echo "Answer:  ";
if($operator == 'add'){
  $complete = $number + $number2;

  echo "$number + $number2 = $complete";
}
if($operator == 'subtract'){
  $complete = $number - $number2;
  echo "$number - $number2 = $complete";
}
if($operator == 'multiply'){
  $complete = $number * $number2;
  echo "$number X  $number2 = $complete";
}
if($operator == 'division'){
  $complete = $number / $number2;
  echo "$number / $number2 = $complete";
}
} 
?>