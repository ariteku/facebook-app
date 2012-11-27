<html>
<head>
<title></title>
<script type="text/javascript">
</script>
</head>
<body>

<h1>プログラマー診断</h1>
<div style='text-align:left;'>
<?php
// 画像の出力
if($fb->checkLiked()) {
	echo "<a href='./question.php'>";
	echo "<img src='" .$confObj['info']['topLogo'] ."' />";
	echo "</a>";

} else {
	echo "<img src='" .$confObj['info']['topLogoDisabled'] ."' />";
}
?>	
</div>

</body>
</html>
