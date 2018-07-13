<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\languageMenu;


NavBar::begin ( [
		'brandLabel' => "<img style='width: 104px;margin-top:-16px;' src='/img/logo.png'>",
		'brandUrl' => Yii::$app->homeUrl,
		'options' => [
				'class' => 'navbar-menu-color navbar-fixed-top' ,
		]
] );

//language dropdown
//
//if (Yii::$app->urlManager instanceof codemix\localeurls\UrlManager) {
//	echo languageMenu::widget();
//}

echo Nav::widget ( [ 
		'options' => [
				'class' => 'navbar-nav navbar-right' 
		],
		'items' => [ 
				[ 
					'label' => Yii::t('app', 'Home'),
					'url' => ['/site/index'] 
				],

				app\helpers\App::isAdmin () ? [ 
					'label' => Yii::t('app', 'Admin'),
					'url' => ['/admin'] 
				] : '',


				Yii::$app->user->isGuest ? [ 
					'label' => Yii::t('app', 'Login'),
					'url' => ['/user/security/login']
				] : [ 
					'label' => Yii::$app->user->identity->username,
					'items' => [
								[
									'label' => Yii::t('app', 'Logout'),
									'url' => ['/user/security/logout'],
									'linkOptions' => ['data-method' => 'post']
								],
//								[
//									'label' => Yii::t('app', 'Profile'),
//									'url' => ['/user/profile']
//								]
//								[
//									'label' => Yii::t('app', 'Setting'),
//									'url' => ['/user/settings']
//								]
						] 
				] 
		] 
] );

		
NavBar::end ();

