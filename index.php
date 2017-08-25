<?php
$f_contents = file('src/flatfile.txt');
$rand_line_number = rand(1, count($f_contents) - 1);
$base_url = substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);

if (empty($_GET)) {
	$rand_line = $f_contents[$rand_line_number - 1];
	$rand_line = trim(preg_replace('/\s\s+/', ' ', $rand_line));
	$rand_line = preg_replace('/\s+/', ' ', $rand_line);
} else {
	$_GET = array_values($_GET);

	if ($_GET['0'] < 1 || $_GET['0'] > count($f_contents)) {
		header('Location: ' . $base_url);
	} else {
		$line = (int)$_GET['0'];
		$rand_line = $f_contents[$line - 1];
		$rand_line = trim(preg_replace('/\s\s+/', ' ', $rand_line));
		$rand_line = preg_replace('/\s+/', ' ', $rand_line);
		$rand_line_number = $line;
	}
}
?><head>
<title><?php echo $rand_line;?></title>
<link rel="stylesheet" type="text/css" href="src/style.css" media="screen"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.6.0/dist/clipboard.min.js"></script>
</head>
<body>
<div class="quote">
	<div class="noselect">"<br /><br /></div>
	<div onclick="location.href='<?php echo $base_url;?>';"><span><?php echo $rand_line;?></span></div>
	<div class="noselect"><br /><br />"</div>
</div>

<div class="footer-left">
Developed by <a href="https://instagram.com/danny.void">DannyVoid</a>. Forked by <a href="https://github.com/ewasion">Evasion</a>.
</div>

<div class="footer-right">
<input class="link" id="quote" type="text" value="<?php echo $base_url . '?' . $rand_line_number;?>">
<button class="btn" data-clipboard-action="copy" data-clipboard-target="#quote">Copy</button>
</div>

<script>
var clipboard = new Clipboard('.btn');
clipboard.on('success', function(e) {
  console.log(e);
});
clipboard.on('error', function(e) {
  console.log(e);
});
window.history.pushState("<?php echo $rand_line;?>", "<?php echo $rand_line;?>", "<?php echo '?' . $rand_line_number;?>");
window.onpopstate = function (e) {
  var id = e.state.id;
  load_item(id);
};
</script>
</body>
