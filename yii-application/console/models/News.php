<?php

namespace console\models;

use Yii;

class News
{
	const STATUS_NOT_SEND = 1;

	public static function getList()
	{
		$sql = 'select * from news where status = ' . self::STATUS_NOT_SEND;
		$result =  Yii::$app->db->createCommand($sql)->queryAll();
		return self::prepareList($result);
	}

	public static function prepareList($result)
	{
		if(!empty($result) && is_array($result)){
			foreach($result as $item){
				$item['content'] = Yii::$app->stringHelper->getShortSpaceText($item['content'], 3);
			}
		}
		return $result;
	}
}