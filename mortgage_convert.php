  <?php

	$amount = $_POST['amount'];
	$interestrate = $_POST['interest'];
  $interest = $interestrate/1200;
  $lengthinyears = $_POST['length'];
  $length = $lengthinyears * 12;
  $frequency = $_POST['frequency'];


    ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

   //$repaymentamount =  $amount*($interest*((1+$interest)^$length))/(((1+$interest)^$length)-1);

   $pow = pow((1 + $interest), $length);
   $repaymentamount = $amount * (($interest * $pow) / ($pow - 1));

   echo $repaymentamount;





?>