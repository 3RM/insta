<?php

namespace console\models;

use Yii;

class Subscriber
{
	public static function getList()
	{
		$sql = 'select * from subscriber';
		return Yii::$app->db->createCommand($sql)->queryAll();
	}
}