<?php

namespace common\components;

use Yii;

class StringHelper
{
	private $maxLength;

	public function __construct()
	{
		$this->maxLength = Yii::$app->params['shortTextLimit'];
	}

	public function getShortSymbolText($string, $maxLength = null)
	{
		if($maxLength === null){
			$maxLength = $this->maxLength;			
		}
		return substr($string, 0 , $maxLength);			
	}

	public function getShortWordText($string, $maxLength = null)
	{
		if($maxLength === null){
			$maxLength = $this->maxLength;			
		}
		
		$str = substr($string, 0,  $maxLength);
		var_dump($string[--$maxLength]);
		if($string[$maxLength] === ' '){
			return substr($string, 0,  $maxLength);
		}
		$length = strlen($str);
		var_dump($str,$length);
		do{
			$str .= $string[$length];
			$next = $length++;
			var_dump($string[$next]);
		}while($string[$next] != ' ');
		
		return $str;
	}

	public function getShortSpaceText($string, $maxLength = null)
	{
		if($maxLength === null){
			$maxLength = $this->maxLength;			
		}

		$str = '';

		$spaceCount = 0;

		for($i=0;$i<strlen($string);$i++){
			$str .= $string[$i];
			if($string[$i] === ' '){
				$spaceCount++;				
				if($spaceCount >= $maxLength){
					return trim($str);
				}
			}
			
		}		
		return trim($str);
		/*for($i=0;$i<=strlen($string);$i++){
			if($string[$i] == ' '){
				$spaceCount++;
			}
			
			if($spaceCount != $maxLength){
				$str .= $string[$i];
			}else{
				return $str;
			}
		}*/
	}
}