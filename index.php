<!DOCTYPE html>
<html>
<head>
<title>Form Calculator</title>
<!--<script type="text/javascript" src="jquery.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

function SubmitFormData(){
   var first = $("#first").val();
   var second = $("#second").val();
   var operator = $("#operator").val(); 
   $.post("calculate.php",
       {
        first:first,
        second:second,
        operator: operator
       },
   function(data){
     $('#results').html(data);
     $('#formcal')[0].reset();
   });
}

</script>

</head>
<body>

<ul>
  <li><a href="index.php">Calculator</a></li>
  <li><a href="bmi.php">Body Mass Index Calculator</a></li>
  <li><a href="currency.php">Currency Converter</a></li>
  <li><a href="temperature.php">Currency Converter</a></li>
  <li><a href="mortgage_calculator.php">Temperature Converter</a></li>
  <li><a href="compound_calculator.php">Temperature Converter</a></li>
  <li><a href="weather.php">Live Weather</a></li> 
</ul>


<h1>Simple Calculator</h1>
<form action="" id="formcal" method="post">

    <input type="number" id="first" name="first" placeholder="number"/>
    <select name="operator" id="operator">
        <option value="add">+</option>
        <option value = "subtract">-</option>
        <option value = "multiply">*</option>
        <option value = "division">/</option>


    </select>

    <input type="number" id="second" name="second" placeholder="number 2"/>

    <input type="button" id="submitFormData" onclick="SubmitFormData();" value="Calculate"/>
</form>


<div id="results">

 </div>


</body>
</html>