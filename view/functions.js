
/**
 * ラジオボックスにチェックが入っているか調べる関数
 * @author 046
 * @param int ラジオボックスの数
 */
var checkRadio = function(radioLength) {

	// すべてのradioボックスグループを舐める
	for(var i = 0; i < radioLength; i++) {
	
		// ラジオボックスのname属性
		var radioName = "radio[" + i + "]";
		var radio = document.form[radioName];
	
		// RadioBoxにchekcが入っているかどうか
		var isCheckFlg = false;
	
		// 対象RadioBoxにチェックボックスが入っているかどうか
		for(var j = 0; j < radio.length; j++) {
			if(radio[j].checked) {
				isCheckFlg = true;
				break;
			}
		}
		// チェックが入っていなければ処理を抜けてfalseで終わる
		if(!isCheckFlg) {
			break;
		}

	}

	// サブミットボタンの活性状態を変更
	document.form.submit.disabled = !isCheckFlg;

}

