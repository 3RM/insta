<?php

namespace console\models;

use Yii;

class Sender
{
	public static function run($subscribers, $newsList)
	{
		$count = 0;
		
		foreach($subscribers as $subscriber){
			$result = Yii::$app->mailer->compose('/mailer/newslist', ['newsList' => $newsList])
                ->setFrom('rodnoymisha5@gmail.com')
                ->setTo($subscriber['email'])
                ->setSubject('Тема сообщения')                
                ->send();
                $count++;
		}
		return $count;
	}
}