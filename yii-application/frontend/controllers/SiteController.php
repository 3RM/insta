<?php
namespace frontend\controllers;


use frontend\models\SearchForm;
use frontend\models\User;
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
       $users = User::find()->all();

        return $this->render('index',[
            'users' => $users,
        ]);
    }

    
}
