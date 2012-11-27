<?php
//  ApplicationConstants.php
//  FBアプリ
//
//  アプリケーション共通の定数
//
//  Created by 046 on 12/05/13.
//  Copyright (c) 2012年 FeelCompany. All rights reserved.
//

class ApplicationConstants {

	//Facebook Developer の情報
	const appId = '';
	const secret = '';

	//質問設定ファイルのパス
	const settingJsonPath = 'application-setting.json';

	//認証のパーミッション
	const scope = 'status_update,publish_stream,photo_upload,publish_actions,share_item,video_upload,create_note';

	//質問ページ（入力チェックエラー時のリダイレクトページ）
	const questionPage = '';

	//投稿に記載されるリンクのURL
	const linkUrl = '';

	//認証後に遷移するページのURL 
	const redirectUri = '';

	//JSON設定ファイル読み込みエラー時のメッセージ
	const errorSettingJsonRead = '申し訳ございません、アプリに問題が発生し現在利用できません';

	//写真の投稿に失敗した時のエラーメッセージ
	const errorWritePhoto = 'エラーが発生しました。もう一度診断を行なってください。';

}
