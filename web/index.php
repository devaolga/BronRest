<!DOCTYPE HTML>
<html>
<head>
<title>BronRest</title>
<link href="css/mainpage.css" rel="stylesheet" type="text/css">
<link href="css/default.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/xml; charset=UTF-8" />
</head>
<body>
<div id="all">
<?php include("header.html");?>
<div id="container">
	<div id="inner">
		<div id="left">
			<div id="Valik"> 
			<form method="post" action="">
			   <p><select name="select">
					<option>City</option>
					<option>Tartu</option>
					<option>Tallinn</option>
					<option>Narva</option>
			   </select></p>
			 </form>
			<select><option>Restaurant</option>
				<option>Dragon</option>
				<option>Volga</option>
				<option>Pierre</option>
			</select>
			<form method="post" action="">
			   <p><select name="select2">
					<option>Kitchen</option>
					<option>A</option>
					<option>B</option>
					<option>C</option>
			   </select></p></form>			   
			  <script src="js/calendar.js" type="text/javascript"></script>
			  <form action="">
				<input type="text" value="dd-mm-yy" onfocus="this.select();lcs(this)"
				onclick="event.cancelBubble=true;this.select();lcs(this)">
			  </form>
				  <p align="left">Guests number:</p>
				  <p><input type="tel" pattern="[0-9]{1,100}"></p>				
				  
			</div>	
		</div>
		<div id="center">
		<p class="rest1">
	    <a href="tableselection.html" ><img src="tmp/Le-Procope.jpg" alt="Rest1" width="150" height="150" style="position:absolute;left:150px; top:50px"></a>
		</p>
		<div style="position:absolute;left:180px; top:230px">
		<h6>Restaurant Test
		<br>
		Location:Tartu Raatuse 1
		<br>
		Opened: 8:00-22:00
		<br>
		Kitchen:Italian
		Max: 20 ppl
		<br>
		"We have best pizza in town"</h6>
		</div>
		</div>	
		<div class="clear">
		</div>
	</div>
</div>
<?php include("footer.html");?>
</div>
</body>
</html>


