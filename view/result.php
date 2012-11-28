<?php
//  result.php
//  FBアプリ
//
//  診断結果表示ページ
//
//  Created by takuan on 12/05/13.
//  Copyright (c) 2012年 takuan. All rights reserved.
//
error_log("result.php:: start");

header('p3p: CP="ALL DSP COR PSAa PSDa OUR NOR ONL UNI COM NAV"');
header("Content-type: text/html; charset=utf-8");

require_once(__DIR__.'/../model/FacebookUtils.php');
require_once(__DIR__.'/../model/ApplicationConstants.php');

$fbUtils = new FacebookUtils();
$fbUtils->checkLogin();

// 設定ファイル読み込み
$file = file_get_contents(__DIR__.'/../model/'.ApplicationConstants::settingJsonPath);
if($file === false) {
	error_log('index.php:: 設定ファイルの取得に失敗しました:: ' .ApplicationConstants::settingJsonPath);
	die(ApplicationConstants::errorSettingJsonRead);

} else {
	$confObj = json_decode($file, true);
	if($confObj === null) {
		error_log('index.php:: jsonパースエラー');
		die(ApplicationConstants::errorSettingJsonRead);
	}
}

// 前の画面にリダイレクト
function redirect($url) {
	header("Location: $url");
	exti;
}

// 入力値チェック
$result = "";
for($i = 0; $i < count($confObj['questions']); $i++) {
	if(!isset($_REQUEST["radio"][$i])){
		redirect(ApplicationConstants::questionPage ."?error=requireError");
	}
	$result = $result .$_REQUEST["radio"][$i];
}

/*
if(isset($confObj['results'][$result]['message'])
	&& isset($confObj['results'][$result]['image'])) {
 */
if(isset($confObj['results'][$result]['message'])){
	// Wallに書き込み
	$fbUtils->writePhotoMe(
		$confObj['results'][$result]['message'],
		$confObj['results'][$result]['image']
	);
}

require_once('./result.page.php');

error_log("result.php:: end");

