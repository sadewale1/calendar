<!DOCTYPE html>
<!-- Sikiru Adewale
CSCI 5060
Assignment 3 
-->
<?php

 #filtering input
$month = filter_input(INPUT_POST, "month", FILTER_VALIDATE_INT);
if ($month === false || empty($month) || $month < 0 || $month > 12) {
	$month = 0;
}
		
$year = filter_input(INPUT_POST, "year", FILTER_VALIDATE_INT);
if ($year === false || empty($year) || $year < 1902 || $year > 2037) {
	$year = 2019;
}
		
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Sikiru Adewale's Calendar-O-Rama</title>
	<link rel="stylesheet" type="text/css" href="site.css"> 
</head>

<body>
<div class="header">
		<div id = "containter"><img src="image/img.png">
</div>
	<div class="content">
	<h1>Sikiru Adewale's Calendar-O-Rama</h1>

	<div id="formDiv">
	<form 
		action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], 
			ENT_NOQUOTES, "UTF-8"); ?>"
			method="post">
			<label for="month">Month</label>
			<input type="number" id="month" name="month" 
			value="<?php echo htmlspecialchars($month); ?>" 
			min="1" max="12" required>
			<br>
			
			<label for="year">Year</label>
			<input type="number" id="year" name="year" 
			value="<?php echo htmlspecialchars($year); ?>" min="1902" max="2037" >
			<br>
			
			<div id="buttonDiv">
				<input type="submit" value="submit">
				<input type="reset" value="reset">
			</div>
		</form>
		
	</div>
	
	<div id="resultDiv">
		<h2>Calendar-O-Rama</h2>
		
	<?php
	$month = '';
				$year = date('Y');

				if (isset($_POST['month'])) {

					$month = $_POST['month'];
					$year = $_POST['year'];

					$ym = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT);

					$month_day = array(
						'1' => array(31, 'January'),
						'2' => array(28, 'Feburary'),
						'3' => array(31, 'March'),
						'4' => array(30, 'April'),
						'5' => array(31, 'May'),
						'6' => array(30, 'June'),
						'7' => array(31, 'July'),
						'8' => array(31, 'August'),
						'9' => array(30, 'September'),
						'10' => array(31, 'October'),
						'11' => array(30, 'November'),
						'12' => array(31, 'December')
					);


					if (!filter_var($month, FILTER_VALIDATE_INT)) {
						echo '<p class="err-msg">Month should be number</p>';
					} else if (!filter_var($year, FILTER_VALIDATE_INT)) {
						echo '<p class="err-msg">Year should be number</p>';
					} else {
						if (!array_key_exists($month, $month_day)) {
							echo '<p class="err-msg">Invalid Month passed.</p>';
						} else if ($year < 1902 && $year > 2038) {
							echo '<p class="err-msg">Invalid Year passed.</p>';
						} else {

							$timestamp = strtotime($ym . '-01');
							if ($timestamp === false) {
								$ym = date('Y-m');
								$timestamp = strtotime($ym . '-01');
							}

							$today = date('Y-m-j', time());

							$html_title = date('Y / m', $timestamp);

							$day_count = date('t', $timestamp);

							$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

							$weeks = array();
							$week = '';

							$week .= str_repeat('<td></td>', $str);
							for ( $day = 1; $day <= $day_count; $day++, $str++) {

								$date = $ym . '-' . $day;

								if ($today == $date) {
									$week .= '<td class="cur">' . $day;
								} else {
									$week .= '<td>' . $day;
								}
								$week .= '</td>';

								if ($str % 7 == 6 || $day == $day_count) {
									if ($day == $day_count) {
										$week .= str_repeat('<td></td>', 6 - ($str % 7));
									}
									$weeks[] = '<tr>' . $week . '</tr>';
									$week = '';
								}
							}
							echo '<div class="result">
								'.$month_day[$month[0]][1].' '.$year.'<br>
								<img src="image/1.png">
								<table class="table">
						            <tr>
						                <th>S</th>
						                <th>M</th>
						                <th>T</th>
						                <th>W</th>
						                <th>T</th>
						                <th>F</th>
						                <th>S</th>
						            </tr>';
					                foreach ($weeks as $week) {
					                    echo $week;
					                }
	            				echo ' </table>
	            			</div>';
						}
					}
				}
		?>
		
		<a href="index.html">Go back to home page</a>
	

</body>
</html>