<!DOCTYPE html>	
<html>
  <head>
    <title>Currency Converter</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

function SubmitFormData(){
   var first = $("#first").val();
   //var second = $("#second").val();
   var operator = $("#convertType").val(); 
   $.post("temperature_convert.php",
       {
        first:first,
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
  <li><a href="temperature.php">Temperature Converter</a></li>
  <li><a href="mortgage_calculator.php">Mortgage Converter</a></li>
  <li><a href="compound_calculator.php">Compound Converter</a></li>
 <li><a href="weather.php">Live Weather</a></li>
</ul>


<h1>Temperature converter</h1>
  

<html>
    <head>
        <title>Temp. Conv.</title>
    </head>
    <body>
       <form action="" id="formcal" method="post">

<table>
<tr>
    <td>Enter value to convert</td>
    <td><input type="number" name="first" id="first" size="15"></td>
</tr>

<tr>
    <td>Convert to:</td>
    <td><select name="convertType" id="convertType" size="1">
               <option disabled> Select a measurement type</option>
               <option value="celsius">Celsius</option>
               <option value="fahrenheit">Fahrenheit</option>
        </select>
    </td>
</tr>

<tr>
    <td> <input type="button" id="submitFormData" onclick="SubmitFormData();" value="Convert"/></td>
    
</tr>



</form>

<div id="results">

 </div>


</body>
</html>