<!DOCTYPE html>	
<html>
  <head>
    <title>Currency Converter</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

function SubmitFormData(){
   var amount = $("#amount").val();
   var interest = $("#interest").val();   
    var length = $("#length").val();   
   var frequency = $("#frequency").val(); 
   $.post("mortgage_convert.php",
       {
        amount:amount,
        interest: interest,
        length: length,
        frequency:frequency
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


<h1>Compound Interest Calculator</h1>
  

<html>
    <head>
        <title>Temp. Conv.</title>
    </head>
    <body>
       <form action="" id="formcal" method="post">

<table>
<tr>
    <td>Principal amount(P) </td>
    <td><input type="number" name="amount" id="amount" size="15"></td>
</tr>

<tr>
    <td>Annual rate(r) </td>
    <td><input type="number" name="rate" id="rate" size="15"></td>
</tr>

<tr>
    <td>Years (t) </td>
    <td><input type="number" name="length" id="length" size="15"></td>
</tr>


<tr>
    <td>Years (t) </td>
    <td><input type="number" name="length" id="length" size="15"></td>
</tr>



<tr>
    <td> <input type="button" id="submitFormData" onclick="SubmitFormData();" value="Convert"/></td>

    
</tr>



</form>

<div id="results">

 </div>


</body>
</html>