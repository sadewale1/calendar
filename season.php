<!DOCTYPE html>
<!-- Sikiru Adewale
CSCI 5060
Assignment 3 
-->
<?php
		
$month = filter_input(INPUT_GET, "month", FILTER_VALIDATE_INT);
if ($month === false || empty($month) || $month < 0 || $month > 12) {
	$month = 0;
}
		
$day = filter_input(INPUT_GET, "day", FILTER_VALIDATE_INT);
if ($day === false || empty($day) || $day < 0 || $day > 31) {
	$day = 0;
}
		
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Sikiru Adewale's Salt and Pepper Seasoning</title>
	<link rel="stylesheet" type="text/css" href="site.css"> 
</head>

<body>
<div class="header">
		<div id = "containter"><img src="image/img.png">
</div>
	<div class="content">
	<h1>Sikiru Adewale's Salt and Pepper Seasoning</h1>

	<div id="formDiv">
	<form 
		action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], 
			ENT_NOQUOTES, "UTF-8"); ?>"
			method="get">
			<label for="month">Month</label>
			<input type="number" id="month" name="month" 
			value="<?php echo htmlspecialchars($month); ?>" 
			min="1" max="12" required>
			<br>
			
			<label for="day">Day</label>
			<input type="number" id="day" name="day" 
			value="<?php echo htmlspecialchars($day); ?>" min="1" max="31" required>
			<br>
			
			<div id="buttonDiv">
				<input type="submit" value="submit">
				<input type="reset" value="reset">
			</div>
		</form>
		
	</div>
	
<div id="season">
	<h2>Salt and Pepper Seasoning</h2>

<?php

# Spring Season
if ($month==4 && $day==31){
	echo "<p>invalid date </p>";
}
elseif ($month==3 and $day>=21) {
	echo "<p>The date $month/$day is in Spring</p>";
}  
elseif ($month==4 or $month==5){
	echo "<p>The date $month/$day is in Spring</p>";
}
elseif ($month==6 && $day<=20){
	echo "<p>The date $month/$day is in Spring</p>";
}

# Summer season
if ($month==6 && $day==31){
	echo "<p>invalid date </p>";
}	
elseif($month==6 and $day>=21){
	echo "<p>The date $month/$day is in Summer</p>";
}
elseif ($month==7 or $month==8){
	echo "<p>The date $month/$day is in Summer</p>";
}
elseif ($month==9 && $day<=21){
	echo "<p>The date $month/$day is in Summer</p>";
}

# Fall Season
if ($month==9 and $day==31 or $month==11 and $day==31) {
	echo "<p>Invalid date</p>";
}  	
elseif ($month==9 and $day>=22) {
	echo "<p>The date $month/$day is in Fall</p>";
}  
elseif ($month==10 or $month==11){
	echo "<p>The date $month/$day is in Fall</p>";
}
elseif ($month==12 && $day<=20){
	echo "<p>The date $month/$day is in Fall</p>";
}

# Winter Season
if ($month==2 and $day>=29) {
	echo "<p>Invalid date</p>";
}  	
elseif ($month==12 and $day>=21) {
	echo "<p>The date $month/$day is in Winter</p>";
}  
elseif ($month==1 or $month==2){
	echo "<p>The date $month/$day is in Winter</p>";
}
elseif ($month==3 && $day<=20){
	echo "<p>The date $month/$day is in Winter</p>";
}
		
?>		
<br>
<br>	
			
	<a href="index.html">Go back to home page</a>
	

</body>
</html>
