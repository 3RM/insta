<?php

namespace common\models;

use Yii;

class NewsSearch
{
	public static function simpleSearch($keywords)
	{
		$sql = "select * from news where content like '%$keywords%' limit 10";
		return Yii::$app->db->createCommand($sql)->queryAll();
	}
}