<?php
$f_contents = file("flatfile.txt");
$rand_line_number = rand(1, count($f_contents) - 1);
$base_url = "http://" . $_SERVER['SERVER_NAME'] . "/";

if (empty($_GET)) {
$rand_line = $f_contents[$rand_line_number - 1];
$rand_line = trim(preg_replace('/\s\s+/', ' ', $rand_line));
}

else {

if ($_GET['quote'] == "0" || $_GET['quote'] == "00") {
	header("Location: $base_url");
} else {

$line = (int)$_GET['quote'];
$rand_line = $f_contents[$line - 1];
$rand_line = trim(preg_replace('/\s\s+/', ' ', $rand_line));
$rand_line_number = $line;
}
}
?>
<title><?php echo $rand_line;?></title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="quote">
	"<br /><br />&nbsp;&nbsp;&nbsp;
	<div onclick="location.href='<?php echo $base_url;?>';"><?php echo $rand_line;?></div>
	<br /><br /><br />&nbsp;&nbsp;&nbsp;"
</div>