<?php

	$amount = $_POST['amount'];
	$rate = $_POST['rate'];
  $length = $_POST['length'];
  



    ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

   //$repaymentamount =  $amount*($interest*((1+$interest)^$length))/(((1+$interest)^$length)-1);

   $pow = pow((1 + $rate/$length), $length * $rate);
   $compoundamount = $amount * $pow;

   echo $compoundamount;





?>