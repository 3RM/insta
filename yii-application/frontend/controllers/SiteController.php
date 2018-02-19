<?php
namespace frontend\controllers;


use frontend\models\SearchForm;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    /**
     * Поиск
     * @return [type] [description]
     */
    public function actionSearch()
    {

        $model = new SearchForm();

        if($model->load(Yii::$app->request->post()) && $result = $model->search()){
            var_dump($result);die;
        }

        return $this->render('search', [
            'model' => $model,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $string = "Hello world, it is the magic time for coding!";

        //echo Yii::$app->stringHelper->getShortText($string);die;
        //echo Yii::$app->stringHelper->getShortWordText($string, 29);die;
        //echo Yii::$app->stringHelper->getShortSpaceText($string, 2);die;
        return $this->render('index');
    }

    
}
