<?php

$f_contents = file("flatfile.txt"); 

if (empty($_GET)) {
$rand_line = $f_contents[rand(0, count($f_contents) - 1)];
$rand_line = trim(preg_replace('/\s\s+/', ' ', $rand_line));
}

else {
$line = (int)$_GET['quote'];
$rand_line = $f_contents[$line - 1];
$rand_line = trim(preg_replace('/\s\s+/', ' ', $rand_line));
}

?>
<title><?php echo $rand_line;?></title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="quote">
	"<br /><br />&nbsp;&nbsp;&nbsp;
	<div onclick="location.href='http://dannyvoid.design/';"><?php echo $rand_line;?></div>
	<br /><br /><br />&nbsp;&nbsp;&nbsp;"
</div>
