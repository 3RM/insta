<?php

namespace frontend\models;

use yii\base\Model;
use common\models\NewsSearch;

/**
 * 
 */
class SearchForm extends Model
{
	public $keywords;

	/**
	 * 
	 */
	public function rules()
	{
		return [
			['keywords', 'trim'],
			['keywords','required'],
			['keywords', 'string', 'min' => 3],
		];
	}

	public function search()
	{
		if($this->validate()){
			return NewsSearch::simpleSearch($this->keywords);
		}
	}
}