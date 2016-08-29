<!DOCTYPE html>
<html>
<head>
<title>Form Calculator</title>
</head>
<body>



<div id="form-BMI">
<ul>
  <li><a href="index.php">Calculator</a></li>
  <li><a href="bmi.php">BMI Calculator</a></li>
  <li><a href="currency.php">Currency Converter</a></li>
  <li><a href="temperature.php">Currency Converter</a></li>
  <li><a href="mortgage_calculator.php">Temperature Converter</a></li>
  <li><a href="compound_calculator.php">Temperature Converter</a></li>
  <li><a href="weather.php">Live Weather</a></li>
</ul>

<h1>Body Mass Index Calculation</h1>
<form action="" method="post">

<label>Weight in Kilogram: </label><input type="number" name="1" placeholder="number"/>
<br>
<br>
<label>Height in Centimeter: </label><input type="number" name="2" placeholder="number 2"/>

<input type="submit" value="Calculate"/>
</form>


</div>

<br>
<?php
	if(!empty($_POST['1']) && !empty($_POST['2'])){
		$number = $_POST['1'];
		$number2 = $_POST['2'];
		$num2m = $number2/100;
		$metersquare = $num2m * $num2m;
		$BMI = $number/$metersquare;
		$status = "";
		if($BMI < 18.5){
				$status = "Underweight";
			}
			else if($BMI > 18.5 && $BMI < 24.9){
				$status = "Normal";
			}
			else if($BMI > 25 && $BMI < 29.9){
				$status = "Overweight";
			}
			else if($BMI > 30){
				$status = "Obese";
			}


			
		echo "Your BMI is $BMI<br>";
		echo "You are classified as $status";
			
	}
?>



</body>
</html>





