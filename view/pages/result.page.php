<!-- ここはデザイナさんに依頼 -->

<html>
<head>
<link rel="stylesheet" href="./css/main.css">
</head>
<body>
<?php

// 結果画面のLogoが設定されていればそれを出力
if(isset($confObj['info']['resultLogo'])) {
	echo "<h1 style='text-align: center;'>";
	echo "<img src='" .$confObj['info']['resultLogo'] ."' />";
	echo "</h1>";
} else {
	echo "<h1>診断結果</h1>";
}
?>
<!-- 結果文字 -->
<p style="text-align:center;">
<?php echo $confObj['results'][$result]['message']; ?>
</p>
<!-- 結果画像 -->
<div style='text-align:center;'>
<img src="<?php echo $confObj['results'][$result]['image']; ?>" />
</div>

</body>
</html>
