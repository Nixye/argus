<?php
	$urlBase = URL_BASE;
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "<?= url("resources/css/") ?>cmdStyle.css" />
		<script src="https://cdn.jsdelivr.net/npm/javascript-obfuscator/dist/index.browser.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
		<title>Agamenon</title>
	</head>
	<script src="<?= url("resources/js/") ?>init.js"></script>
	<body onload='init("<?=$urlBase?>")'>
        <?= $this->section('content') ?>
		<script src="<?= url("resources/js/") ?>inputKeyPromtp.js"></script>
	</body>
</html>