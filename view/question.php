<?php
//  question.php
//  FBアプリ
//
//  質問回答ページ
//
//  Created by takuan on 12/05/13.
//  Copyright (c) 2012年 takuan. All rights reserved.
//
error_log("question.php:: start");

header('p3p: CP="ALL DSP COR PSAa PSDa OUR NOR ONL UNI COM NAV"');
header("Content-type: text/html; charset=utf-8");

require_once(__DIR__.'/../model/FacebookUtils.php');
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

require_once('./pages/question.page.php');

error_log("question.php:: end");

