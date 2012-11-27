<html>
<head>
<link rel="stylesheet" href="./css/main.css">
<script src="./functions.js"></script>
<script type="text/javascript">

var radioLength = <?php echo count($confObj['questions']) ?>;
var onClickRadio = function() {
	checkRadio(radioLength);
}

</script>
<body>
<!-- ロゴ画像 -->
<h1>
<img src="<?php echo $confObj['info']['logo']; ?>" />
</h1>
<?php
// エラーメッセージを出力
if(isset($_GET['error'])) {
	echo "<p class='error'>";
	echo $confObj['messages'][$_GET['error']];
	echo "</p>";
}
?>

<form action="./result.php" name="form" id="form">
<?php
//質問文
$i = 0;	
foreach($confObj['questions'] as $question) {

	echo "<img src='".$question['questionImg'] ."' />";
	$ii = 0;
	//回答選択肢
	foreach($question['choices'] as $c) {
		echo "<p>";
		echo "<input type='radio' name='radio[$i]' value='$ii' onClick='onClickRadio();' /> ";
		echo $c;
		echo "</p>";
		$ii++;
	}
	$i++;
}

?>
<input type="submit" name="submit" disabled />
<br />
※診断結果をFacebookに投稿します
</form>

</body>
</html>

