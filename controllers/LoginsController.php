<?php

namespace app\controllers;

use app\models\Blocks;
use app\models\Brands;
use app\models\Category;
use app\models\Item;
use app\models\Request;
use app\models\Role;
use app\models\Rooms;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


class LoginsController extends Controller{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','delete','view','create','update'],
                'rules' => [
                    [
                        'actions' => ['index','logout','create','delete','view','update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex(){
        $role=Role::find()->select(['name','id'])->all();
        $user=new  Users();

        $rooms=Users::find()->all();
        $post=new Users();
        if($post->load(Yii::$app->request->post())){
            if($post->save()){
                Yii::$app->getSession()->setFlash('message','Successfully Posted User');
                return $this->redirect(['index']);
            }
        }
        return $this->render('index',compact('rooms','post','role','user'));
    }



}

?>