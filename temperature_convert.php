<?php

	$valueConvert = $_POST['first'];
	$convertType = $_POST['operator'];

    ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

   if($convertType == "fahrenheit"){
       $conversion = ((9/5) * $valueConvert) + (32);
       echo "The initial temperature was $valueConvert. The new temperature is $conversion.";
   }
    else if ($convertType == "celsius"){
       $conversion = ($valueConvert - 32) * (5/9);
        echo "The initial temperature was $valueConvert. The new temperature is $conversion.";
   }
 






?>