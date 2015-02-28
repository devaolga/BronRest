<!DOCTYPE HTML>
<html>
<head>
<title>BronRest</title>
<link href="css/contactdetails.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/xml; charset=UTF-8" />
</head>
<body>
<div id="all">
<?php include("header.html");?>
<div id="container">
<br>
<?php include("bron_process.html");?> 
<br>
<div id="contact"  align="center">
	<h1>Contact Details</h1>	
	<br>
	<b>Phone number:</b>
	<input type=number name="number" size=27 maxlength=15 value="+372">
	<br>
	<br>
	<b>Name:</b>
	<input type=text name="name" size=37 maxlength=100>
	<br>
	<br>
	<b>Email:</b>
	<input type=text name="email" size=37 maxlength=80 value="@">
	<br>
	<br>
	<textarea name="comments" rows="6" cols="30">Comment section...</textarea>
</div>
<br>
<div id="submit"  align="center">	
<FORM>
 <INPUT TYPE="SUBMIT" VALUE ="Submit">
 </FORM>
 	</div>
	<div id="inner">
		<div id="center"> </div>
		<div class="clear"></div>
	</div>
	
		
</div>
<?php include("footer.html");?>
</div>
</body>
</html>


