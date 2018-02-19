<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use console\models\News;
use console\models\Subscriber;
use console\models\Sender;

class MailerController extends Controller
{
	/**
	 *	send mail
	 */
	public function actionSend()
	{
		$subscribers = Subscriber::getList();
		$newsList = News::getList();

		$count = Sender::run($subscribers, $newsList);

		Console::output("\nEmails sent: {$count}");
		
	}
}