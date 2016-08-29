<!DOCTYPE html>
<html>
  <head>
    <title>Currency Converter</title>
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


<h1>Currency Converter using Google API</h1>
    
<?php
include "convertcurrency.php";
$from 		= isset($_POST['from']) ? $_POST['from'] : '';
$to 		= isset($_POST['to']) ? $_POST['to'] : '';
$amount 	= isset($_POST['amount']) ? $_POST['amount'] : '';
$content = "";
if($_POST){
    if(!is_numeric($amount)){
	$content .= "<br><span style='background-color:red;padding:5px;color:#fff;'>Invalid amount.</span>";
    }
    elseif($from == $to){
	$content .= "<br><span style='background-color:red;padding:5px;color:#fff;'>Please select distinct currencies.</span>";
    }
    else{
	$rawData = currencyConvert($from,$to,$amount);
	$regex 	= '#\<span class=bld\>(.+?)\<\/span\>#s';
	preg_match($regex, $rawData, $converted);
	$result = $converted[0];
	if($result == ""){
	    $content .= "<br><span style='background-color:red;padding:5px;color:#fff;'>Exchange Rate not available.</span>";
	}
	else{
	    $content .= "<br><span style='background-color:#26A651;padding:5px;'>".$amount." ".$from." = ".$result."</span>";
	}
    }    
}

$listFrom = '
<select name="from">
<option  value="AED">United Arab Emirates Dirham (AED)</option>
<option  value="AFN">Afghan Afghani (AFN)</option>
<option  value="ALL">Albanian Lek (ALL)</option>
<option  value="AMD">Armenian Dram (AMD)</option>
<option  value="ANG">Netherlands Antillean Guilder (ANG)</option>
<option  value="AOA">Angolan Kwanza (AOA)</option>
<option  value="ARS">Argentine Peso (ARS)</option>
<option  value="AUD">Australian Dollar (A$)</option>
<option  value="AWG">Aruban Florin (AWG)</option>
<option  value="AZN">Azerbaijani Manat (AZN)</option>
<option  value="BAM">Bosnia-Herzegovina Convertible Mark (BAM)</option>
<option  value="BBD">Barbadian Dollar (BBD)</option>
<option  value="BDT">Bangladeshi Taka (BDT)</option>
<option  value="BGN">Bulgarian Lev (BGN)</option>
<option  value="BHD">Bahraini Dinar (BHD)</option>
<option  value="BIF">Burundian Franc (BIF)</option>
<option  value="BMD">Bermudan Dollar (BMD)</option>
<option  value="BND">Brunei Dollar (BND)</option>
<option  value="BOB">Bolivian Boliviano (BOB)</option>
<option  value="BRL">Brazilian Real (R$)</option>
<option  value="BSD">Bahamian Dollar (BSD)</option>
<option  value="BTN">Bhutanese Ngultrum (BTN)</option>
<option  value="BWP">Botswanan Pula (BWP)</option>
<option  value="BYR">Belarusian Ruble (BYR)</option>
<option  value="BZD">Belize Dollar (BZD)</option>
<option  value="CAD">Canadian Dollar (CA$)</option>
<option  value="CDF">Congolese Franc (CDF)</option>
<option  value="CHF">Swiss Franc (CHF)</option>
<option  value="CLF">Chilean Unit of Account (UF) (CLF)</option>
<option  value="CLP">Chilean Peso (CLP)</option>
<option  value="CNH">CNH (CNH)</option>
<option  value="CNY">Chinese Yuan (CN¥)</option>
<option  value="COP">Colombian Peso (COP)</option>
<option  value="CRC">Costa Rican Colón (CRC)</option>
<option  value="CUP">Cuban Peso (CUP)</option>
<option  value="CVE">Cape Verdean Escudo (CVE)</option>
<option  value="CZK">Czech Republic Koruna (CZK)</option>
<option  value="DEM">German Mark (DEM)</option>
<option  value="DJF">Djiboutian Franc (DJF)</option>
<option  value="DKK">Danish Krone (DKK)</option>
<option  value="DOP">Dominican Peso (DOP)</option>
<option  value="DZD">Algerian Dinar (DZD)</option>
<option  value="EGP">Egyptian Pound (EGP)</option>
<option  value="ERN">Eritrean Nakfa (ERN)</option>
<option  value="ETB">Ethiopian Birr (ETB)</option>
<option  value="EUR">Euro (€)</option>
<option  value="FIM">Finnish Markka (FIM)</option>
<option  value="FJD">Fijian Dollar (FJD)</option>
<option  value="FKP">Falkland Islands Pound (FKP)</option>
<option  value="FRF">French Franc (FRF)</option>
<option  value="GBP">British Pound Sterling (£)</option>
<option  value="GEL">Georgian Lari (GEL)</option>
<option  value="GHS">Ghanaian Cedi (GHS)</option>
<option  value="GIP">Gibraltar Pound (GIP)</option>
<option  value="GMD">Gambian Dalasi (GMD)</option>
<option  value="GNF">Guinean Franc (GNF)</option>
<option  value="GTQ">Guatemalan Quetzal (GTQ)</option>
<option  value="GYD">Guyanaese Dollar (GYD)</option>
<option  value="HKD">Hong Kong Dollar (HK$)</option>
<option  value="HNL">Honduran Lempira (HNL)</option>
<option  value="HRK">Croatian Kuna (HRK)</option>
<option  value="HTG">Haitian Gourde (HTG)</option>
<option  value="HUF">Hungarian Forint (HUF)</option>
<option  value="IDR">Indonesian Rupiah (IDR)</option>
<option  value="IEP">Irish Pound (IEP)</option>
<option  value="ILS">Israeli New Sheqel (₪)</option>
<option  value="INR">Indian Rupee (Rs.)</option>
<option  value="IQD">Iraqi Dinar (IQD)</option>
<option  value="IRR">Iranian Rial (IRR)</option>
<option  value="ISK">Icelandic Króna (ISK)</option>
<option  value="ITL">Italian Lira (ITL)</option>
<option  value="JMD">Jamaican Dollar (JMD)</option>
<option  value="JOD">Jordanian Dinar (JOD)</option>
<option  value="JPY">Japanese Yen (¥)</option>
<option  value="KES">Kenyan Shilling (KES)</option>
<option  value="KGS">Kyrgystani Som (KGS)</option>
<option  value="KHR">Cambodian Riel (KHR)</option>
<option  value="KMF">Comorian Franc (KMF)</option>
<option  value="KPW">North Korean Won (KPW)</option>
<option  value="KRW">South Korean Won (₩)</option>
<option  value="KWD">Kuwaiti Dinar (KWD)</option>
<option  value="KYD">Cayman Islands Dollar (KYD)</option>
<option  value="KZT">Kazakhstani Tenge (KZT)</option>
<option  value="LAK">Laotian Kip (LAK)</option>
<option  value="LBP">Lebanese Pound (LBP)</option>
<option  value="LKR">Sri Lankan Rupee (LKR)</option>
<option  value="LRD">Liberian Dollar (LRD)</option>
<option  value="LSL">Lesotho Loti (LSL)</option>
<option  value="LTL">Lithuanian Litas (LTL)</option>
<option  value="LVL">Latvian Lats (LVL)</option>
<option  value="LYD">Libyan Dinar (LYD)</option>
<option  value="MAD">Moroccan Dirham (MAD)</option>
<option  value="MDL">Moldovan Leu (MDL)</option>
<option  value="MGA">Malagasy Ariary (MGA)</option>
<option  value="MKD">Macedonian Denar (MKD)</option>
<option  value="MMK">Myanmar Kyat (MMK)</option>
<option  value="MNT">Mongolian Tugrik (MNT)</option>
<option  value="MOP">Macanese Pataca (MOP)</option>
<option  value="MRO">Mauritanian Ouguiya (MRO)</option>
<option  value="MUR">Mauritian Rupee (MUR)</option>
<option  value="MVR">Maldivian Rufiyaa (MVR)</option>
<option  value="MWK">Malawian Kwacha (MWK)</option>
<option  value="MXN">Mexican Peso (MX$)</option>
<option  value="MYR">Malaysian Ringgit (MYR)</option>
<option  value="MZN">Mozambican Metical (MZN)</option>
<option  value="NAD">Namibian Dollar (NAD)</option>
<option  value="NGN">Nigerian Naira (NGN)</option>
<option  value="NIO">Nicaraguan Córdoba (NIO)</option>
<option  value="NOK">Norwegian Krone (NOK)</option>
<option  value="NPR">Nepalese Rupee (NPR)</option>
<option  selected="selected" value="NZD">New Zealand Dollar (NZ$)</option>
<option  value="OMR">Omani Rial (OMR)</option>
<option  value="PAB">Panamanian Balboa (PAB)</option>
<option  value="PEN">Peruvian Nuevo Sol (PEN)</option>
<option  value="PGK">Papua New Guinean Kina (PGK)</option>
<option  value="PHP">Philippine Peso (Php)</option>
<option  value="PKG">PKG (PKG)</option>
<option  value="PKR">Pakistani Rupee (PKR)</option>
<option  value="PLN">Polish Zloty (PLN)</option>
<option  value="PYG">Paraguayan Guarani (PYG)</option>
<option  value="QAR">Qatari Rial (QAR)</option>
<option  value="RON">Romanian Leu (RON)</option>
<option  value="RSD">Serbian Dinar (RSD)</option>
<option  value="RUB">Russian Ruble (RUB)</option>
<option  value="RWF">Rwandan Franc (RWF)</option>
<option  value="SAR">Saudi Riyal (SAR)</option>
<option  value="SBD">Solomon Islands Dollar (SBD)</option>
<option  value="SCR">Seychellois Rupee (SCR)</option>
<option  value="SDG">Sudanese Pound (SDG)</option>
<option  value="SEK">Swedish Krona (SEK)</option>
<option  value="SGD">Singapore Dollar (SGD)</option>
<option  value="SHP">Saint Helena Pound (SHP)</option>
<option  value="SLL">Sierra Leonean Leone (SLL)</option>
<option  value="SOS">Somali Shilling (SOS)</option>
<option  value="SRD">Surinamese Dollar (SRD)</option>
<option  value="STD">São Tomé and Príncipe Dobra (STD)</option>
<option  value="SVC">Salvadoran Colón (SVC)</option>
<option  value="SYP">Syrian Pound (SYP)</option>
<option  value="SZL">Swazi Lilangeni (SZL)</option>
<option  value="THB">Thai Baht (฿)</option>
<option  value="TJS">Tajikistani Somoni (TJS)</option>
<option  value="TMT">Turkmenistani Manat (TMT)</option>
<option  value="TND">Tunisian Dinar (TND)</option>
<option  value="TOP">Tongan Paʻanga (TOP)</option>
<option  value="TRY">Turkish Lira (TRY)</option>
<option  value="TTD">Trinidad and Tobago Dollar (TTD)</option>
<option  value="TWD">New Taiwan Dollar (NT$)</option>
<option  value="TZS">Tanzanian Shilling (TZS)</option>
<option  value="UAH">Ukrainian Hryvnia (UAH)</option>
<option  value="UGX">Ugandan Shilling (UGX)</option>
<option  value="USD">US Dollar ($)</option>
<option  value="UYU">Uruguayan Peso (UYU)</option>
<option  value="UZS">Uzbekistan Som (UZS)</option>
<option  value="VEF">Venezuelan Bolívar (VEF)</option>
<option  value="VND">Vietnamese Dong (₫)</option>
<option  value="VUV">Vanuatu Vatu (VUV)</option>
<option  value="WST">Samoan Tala (WST)</option>
<option  value="XAF">CFA Franc BEAC (FCFA)</option>
<option  value="XCD">East Caribbean Dollar (EC$)</option>
<option  value="XDR">Special Drawing Rights (XDR)</option>
<option  value="XOF">CFA Franc BCEAO (CFA)</option>
<option  value="XPF">CFP Franc (CFPF)</option>
<option  value="YER">Yemeni Rial (YER)</option>
<option  value="ZAR">South African Rand (ZAR)</option>
<option  value="ZMK">Zambian Kwacha (1968–2012) (ZMK)</option>
<option  value="ZMW">Zambian Kwacha (ZMW)</option>
<option  value="ZWL">Zimbabwean Dollar (2009) (ZWL)</option>
</select>
';

$listTo = '
<select name="to">
<option  value="AED">United Arab Emirates Dirham (AED)</option>
<option  value="AFN">Afghan Afghani (AFN)</option>
<option  value="ALL">Albanian Lek (ALL)</option>
<option  value="AMD">Armenian Dram (AMD)</option>
<option  value="ANG">Netherlands Antillean Guilder (ANG)</option>
<option  value="AOA">Angolan Kwanza (AOA)</option>
<option  value="ARS">Argentine Peso (ARS)</option>
<option  value="AUD">Australian Dollar (A$)</option>
<option  value="AWG">Aruban Florin (AWG)</option>
<option  value="AZN">Azerbaijani Manat (AZN)</option>
<option  value="BAM">Bosnia-Herzegovina Convertible Mark (BAM)</option>
<option  value="BBD">Barbadian Dollar (BBD)</option>
<option  value="BDT">Bangladeshi Taka (BDT)</option>
<option  value="BGN">Bulgarian Lev (BGN)</option>
<option  value="BHD">Bahraini Dinar (BHD)</option>
<option  value="BIF">Burundian Franc (BIF)</option>
<option  value="BMD">Bermudan Dollar (BMD)</option>
<option  value="BND">Brunei Dollar (BND)</option>
<option  value="BOB">Bolivian Boliviano (BOB)</option>
<option  value="BRL">Brazilian Real (R$)</option>
<option  value="BSD">Bahamian Dollar (BSD)</option>
<option  value="BTN">Bhutanese Ngultrum (BTN)</option>
<option  value="BWP">Botswanan Pula (BWP)</option>
<option  value="BYR">Belarusian Ruble (BYR)</option>
<option  value="BZD">Belize Dollar (BZD)</option>
<option  value="CAD">Canadian Dollar (CA$)</option>
<option  value="CDF">Congolese Franc (CDF)</option>
<option  value="CHF">Swiss Franc (CHF)</option>
<option  value="CLF">Chilean Unit of Account (UF) (CLF)</option>
<option  value="CLP">Chilean Peso (CLP)</option>
<option  value="CNH">CNH (CNH)</option>
<option  value="CNY">Chinese Yuan (CN¥)</option>
<option  value="COP">Colombian Peso (COP)</option>
<option  value="CRC">Costa Rican Colón (CRC)</option>
<option  value="CUP">Cuban Peso (CUP)</option>
<option  value="CVE">Cape Verdean Escudo (CVE)</option>
<option  value="CZK">Czech Republic Koruna (CZK)</option>
<option  value="DEM">German Mark (DEM)</option>
<option  value="DJF">Djiboutian Franc (DJF)</option>
<option  value="DKK">Danish Krone (DKK)</option>
<option  value="DOP">Dominican Peso (DOP)</option>
<option  value="DZD">Algerian Dinar (DZD)</option>
<option  value="EGP">Egyptian Pound (EGP)</option>
<option  value="ERN">Eritrean Nakfa (ERN)</option>
<option  value="ETB">Ethiopian Birr (ETB)</option>
<option  value="EUR">Euro (€)</option>
<option  value="FIM">Finnish Markka (FIM)</option>
<option  value="FJD">Fijian Dollar (FJD)</option>
<option  value="FKP">Falkland Islands Pound (FKP)</option>
<option  value="FRF">French Franc (FRF)</option>
<option  value="GBP">British Pound Sterling (£)</option>
<option  value="GEL">Georgian Lari (GEL)</option>
<option  value="GHS">Ghanaian Cedi (GHS)</option>
<option  value="GIP">Gibraltar Pound (GIP)</option>
<option  value="GMD">Gambian Dalasi (GMD)</option>
<option  value="GNF">Guinean Franc (GNF)</option>
<option  value="GTQ">Guatemalan Quetzal (GTQ)</option>
<option  value="GYD">Guyanaese Dollar (GYD)</option>
<option  value="HKD">Hong Kong Dollar (HK$)</option>
<option  value="HNL">Honduran Lempira (HNL)</option>
<option  value="HRK">Croatian Kuna (HRK)</option>
<option  value="HTG">Haitian Gourde (HTG)</option>
<option  value="HUF">Hungarian Forint (HUF)</option>
<option  value="IDR">Indonesian Rupiah (IDR)</option>
<option  value="IEP">Irish Pound (IEP)</option>
<option  value="ILS">Israeli New Sheqel (?)</option>
<option  selected="selected" value="INR">Indian Rupee (Rs.)</option>
<option  value="IQD">Iraqi Dinar (IQD)</option>
<option  value="IRR">Iranian Rial (IRR)</option>
<option  value="ISK">Icelandic Króna (ISK)</option>
<option  value="ITL">Italian Lira (ITL)</option>
<option  value="JMD">Jamaican Dollar (JMD)</option>
<option  value="JOD">Jordanian Dinar (JOD)</option>
<option  value="JPY">Japanese Yen (¥)</option>
<option  value="KES">Kenyan Shilling (KES)</option>
<option  value="KGS">Kyrgystani Som (KGS)</option>
<option  value="KHR">Cambodian Riel (KHR)</option>
<option  value="KMF">Comorian Franc (KMF)</option>
<option  value="KPW">North Korean Won (KPW)</option>
<option  value="KRW">South Korean Won (?)</option>
<option  value="KWD">Kuwaiti Dinar (KWD)</option>
<option  value="KYD">Cayman Islands Dollar (KYD)</option>
<option  value="KZT">Kazakhstani Tenge (KZT)</option>
<option  value="LAK">Laotian Kip (LAK)</option>
<option  value="LBP">Lebanese Pound (LBP)</option>
<option  value="LKR">Sri Lankan Rupee (LKR)</option>
<option  value="LRD">Liberian Dollar (LRD)</option>
<option  value="LSL">Lesotho Loti (LSL)</option>
<option  value="LTL">Lithuanian Litas (LTL)</option>
<option  value="LVL">Latvian Lats (LVL)</option>
<option  value="LYD">Libyan Dinar (LYD)</option>
<option  value="MAD">Moroccan Dirham (MAD)</option>
<option  value="MDL">Moldovan Leu (MDL)</option>
<option  value="MGA">Malagasy Ariary (MGA)</option>
<option  value="MKD">Macedonian Denar (MKD)</option>
<option  value="MMK">Myanmar Kyat (MMK)</option>
<option  value="MNT">Mongolian Tugrik (MNT)</option>
<option  value="MOP">Macanese Pataca (MOP)</option>
<option  value="MRO">Mauritanian Ouguiya (MRO)</option>
<option  value="MUR">Mauritian Rupee (MUR)</option>
<option  value="MVR">Maldivian Rufiyaa (MVR)</option>
<option  value="MWK">Malawian Kwacha (MWK)</option>
<option  value="MXN">Mexican Peso (MX$)</option>
<option  value="MYR">Malaysian Ringgit (MYR)</option>
<option  value="MZN">Mozambican Metical (MZN)</option>
<option  value="NAD">Namibian Dollar (NAD)</option>
<option  value="NGN">Nigerian Naira (NGN)</option>
<option  value="NIO">Nicaraguan Córdoba (NIO)</option>
<option  value="NOK">Norwegian Krone (NOK)</option>
<option  value="NPR">Nepalese Rupee (NPR)</option>
<option  value="NZD">New Zealand Dollar (NZ$)</option>
<option  value="OMR">Omani Rial (OMR)</option>
<option  value="PAB">Panamanian Balboa (PAB)</option>
<option  value="PEN">Peruvian Nuevo Sol (PEN)</option>
<option  value="PGK">Papua New Guinean Kina (PGK)</option>
<option  value="PHP">Philippine Peso (Php)</option>
<option  value="PKG">PKG (PKG)</option>
<option  value="PKR">Pakistani Rupee (PKR)</option>
<option  value="PLN">Polish Zloty (PLN)</option>
<option  value="PYG">Paraguayan Guarani (PYG)</option>
<option  value="QAR">Qatari Rial (QAR)</option>
<option  value="RON">Romanian Leu (RON)</option>
<option  value="RSD">Serbian Dinar (RSD)</option>
<option  value="RUB">Russian Ruble (RUB)</option>
<option  value="RWF">Rwandan Franc (RWF)</option>
<option  value="SAR">Saudi Riyal (SAR)</option>
<option  value="SBD">Solomon Islands Dollar (SBD)</option>
<option  value="SCR">Seychellois Rupee (SCR)</option>
<option  value="SDG">Sudanese Pound (SDG)</option>
<option  value="SEK">Swedish Krona (SEK)</option>
<option  value="SGD">Singapore Dollar (SGD)</option>
<option  value="SHP">Saint Helena Pound (SHP)</option>
<option  value="SLL">Sierra Leonean Leone (SLL)</option>
<option  value="SOS">Somali Shilling (SOS)</option>
<option  value="SRD">Surinamese Dollar (SRD)</option>
<option  value="STD">São Tomé and Príncipe Dobra (STD)</option>
<option  value="SVC">Salvadoran Colón (SVC)</option>
<option  value="SYP">Syrian Pound (SYP)</option>
<option  value="SZL">Swazi Lilangeni (SZL)</option>
<option  value="THB">Thai Baht (?)</option>
<option  value="TJS">Tajikistani Somoni (TJS)</option>
<option  value="TMT">Turkmenistani Manat (TMT)</option>
<option  value="TND">Tunisian Dinar (TND)</option>
<option  value="TOP">Tongan Pa?anga (TOP)</option>
<option  value="TRY">Turkish Lira (TRY)</option>
<option  value="TTD">Trinidad and Tobago Dollar (TTD)</option>
<option  value="TWD">New Taiwan Dollar (NT$)</option>
<option  value="TZS">Tanzanian Shilling (TZS)</option>
<option  value="UAH">Ukrainian Hryvnia (UAH)</option>
<option  value="UGX">Ugandan Shilling (UGX)</option>
<option  value="USD">US Dollar ($)</option>
<option  value="UYU">Uruguayan Peso (UYU)</option>
<option  value="UZS">Uzbekistan Som (UZS)</option>
<option  value="VEF">Venezuelan Bolívar (VEF)</option>
<option  value="VND">Vietnamese Dong (?)</option>
<option  value="VUV">Vanuatu Vatu (VUV)</option>
<option  value="WST">Samoan Tala (WST)</option>
<option  value="XAF">CFA Franc BEAC (FCFA)</option>
<option  value="XCD">East Caribbean Dollar (EC$)</option>
<option  value="XDR">Special Drawing Rights (XDR)</option>
<option  value="XOF">CFA Franc BCEAO (CFA)</option>
<option  value="XPF">CFP Franc (CFPF)</option>
<option  value="YER">Yemeni Rial (YER)</option>
<option  value="ZAR">South African Rand (ZAR)</option>
<option  value="ZMK">Zambian Kwacha (1968–2012) (ZMK)</option>
<option  value="ZMW">Zambian Kwacha (ZMW)</option>
<option  value="ZWL">Zimbabwean Dollar (2009) (ZWL)</option>
</select>
';

$listFrom  = str_replace("\"$from\"","\"$from\" selected",$listFrom); // Make dropdown selected
$listTo    = str_replace("\"$to\"","\"$to\" selected",$listTo); // Make dropdown selected

$content .='<form action="" method="post" name="f">
<input name="amount" maxlength="12" size="5" autocomplete="off" value="'.$amount.'"><br />
<div>
'.$listFrom.'
</div>
<div style="padding: 6px 8px">to</div>
<div>
'.$listTo.'
</div>
<input type=submit value="Convert">
</form>';

echo "<div style='margin-left:auto;margin-right:auto;width:290px;'>$content</div>";          
?>
</body>
</html>