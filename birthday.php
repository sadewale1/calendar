<!DOCTYPE html>
<!-- Sikiru Adewale
CSCI 5060
Assignment 3 
-->
<?php

# Filtering the input from form 
		
$month = filter_input(INPUT_GET, "month", FILTER_VALIDATE_INT);
if ($month === false || empty($month) || $month < 0 || $month > 12) {
	$month = 0;
}
		
$day = filter_input(INPUT_GET, "day", FILTER_VALIDATE_INT);
if ($day === false || empty($day) || $day < 0 || $day > 31) {
	$day = 0;
}

$year = filter_input(INPUT_GET, "year", FILTER_VALIDATE_INT);
if ($year === false || empty($year) || $year < 1902 || $year > 2037) {
	$year = 0;
}
		
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Sikiru Adewale's Birthday-O-Matic</title>
	<link rel="stylesheet" type="text/css" href="site.css"> 
</head>

<body>
<div class="header">
		<div id = "containter"><img src="image/img.png">
</div>
	<div class="content">
	<h1>Sikiru Adewale's Birthday-O-Matic</h1>

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
			
			<label for="year">Year</label>
			<input type="number" id="year" name="year" 
			value="<?php echo htmlspecialchars($year); ?>" min="1902" max="2037" required>
			<br>
			
			<div id="buttonDiv">
				<input type="submit" value="submit">
				<input type="reset" value="reset">
			</div>
		</form>
		
	</div>
	
	<div id="resultDiv">
		<h2>Birthday-O-Matic</h2>
		
<?php
	#Days of the week and months
$tstamp = mktime(0, 0, 0, $month, $day, $year);
$dayStr = date("l", $tstamp);
$bday = mktime(0,0,0, $month, $day, 2019);
$bstr = date("l", $bday);
$m = DateTime::createFromFormat('!m', $month);
$mName = $m->format('F');

	#Output
if ($month==9 && $day==31){
	echo "<p>invalid date </p>";
	echo "<p>Click the back arrow </p>";
}
elseif ($month==4 && $day==31){
	echo "<p>invalid date </p>";
	echo "<p>Click the back arrow </p>";

}
elseif ($month==6 && $day==31){
	echo "<p>invalid date </p>";
	echo "<p>Click the back arrow </p>";

}
elseif ($month==11 && $day==31){
	echo "<p>invalid date </p>";
	echo "<p>Click the back arrow </p>";

}
elseif ($month==2 and $day>=29) {
	echo "<p>Invalid date</p>";
	echo "<p>Click the back arrow </p>";
}
else {
	echo "<p>Your birthday was $mName $day, $year</p>";
	echo "<p>You were born on $dayStr</p>";
	echo "<p>This year, your birthday falls on a $bstr</p>";
}
?>		
			
		<a href="index.html">Go back to home page</a>
	

</body>
</html>