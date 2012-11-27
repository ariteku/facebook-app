<?php
//  FacebookUtils.php
//  FBアプリ
//
//  Facebook APIを処理するクラス
//
//  Created by 046 on 12/05/13.
//  Copyright (c) 2012年 FeelCompany. All rights reserved.
//
include __DIR__.'/../vendor/php-sdk/src/facebook.php';
include __DIR__.'/ApplicationConstants.php';

class FacebookUtils {

	// Facebook php-sdk のインスタンス
	protected $facebook;

	/**
	 * コンストラクタ
	 */
	public function __construct(){
		$this->facebook = new Facebook(array(
			'appId'  => ApplicationConstants::appId,
			'secret' => ApplicationConstants::secret,
			'cookie' => true,
		));
	}

	/**
	 * ログインチェック
	 *
	 * @author 046
	 */
	public function checkLogin() {
		$user = $this->facebook->getUser();
		if(!$user){
			$loginUrl = $this->facebook->getLoginUrl(
				array(
					'canvas' => 1,
					'fbconnect' => 0,
					'scope' => ApplicationConstants::scope,
					'redirect_uri' => ApplicationConstants::redirectUri
				 )
			);
			header('Location: ' .$loginUrl );
			exit();
		}
		$this->facebook->getAccessToken();
	}

	/**
	 * ページがイイねされているかどうか判定する
	 * 
	 * @author 046
	 * @return イイねされていれば1を返す
	 */
	public function checkLiked() {
		$signed = $this->facebook->getSignedRequest();
		return $signed['page']['liked'];
	}

	/**
	 * ログイン中のユーザーにPhotoに画像を投稿
	 *
	 * @author 046
	 */
	public function writePhotoMe($writeStr, $photoUrl) {
		try {
			//$userId = $this->facebook->getUser();
			
			$data = array(
				'access_token' => $this->facebook->getAccessToken(),
				'url'   => $photoUrl,
				'name'  => $writeStr,
				'link' => ApplicationConstants::linkUrl
			);
			$data = $this->facebook->api("/me/photos", 'post', $data);

		} catch (FacebookApiException $e) {
			error_log('FacebookUtils#writePhotoMe()');
			error_log($e->getMessage());
			echo '<p class="error">';
			echo ApplicationConstants::errorWritePhoto;
			echo '</p>';
			exit();
		}

	}

	// 文字エスケープ
	public static function h($str) {
		return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
	}

}
