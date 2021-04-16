<?php

namespace app\controllers;

use app\models\Users;
use app\models\Blocks;
use app\models\Rooms;
use app\models\Role;
use app\models\Room;
use app\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;


class LoginUserController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index','view','update','delete','create'],
                'rules' => [
                    [
                        'actions' => ['index','logout','create','delete','view','update','register'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

         $users=Users::find()->all();
         $user=new Users();
         $role=Role::find()->select(['name','id'])->all();
         $rooms=Room::find()->select(['names','id'])->all();
         $blocks=Blocks::find()->select(['names','id'])->all();
         if ($user->load(Yii::$app->request->post())){
            if ($user->validate()){
                $user->username=$_POST['Users']['username'];
                $user->email=$_POST['Users']['email'];
                $user->role_id=$_POST['Users']['role_id'];
                $user->password = $user->setPassword($_POST['Users']['password']);
                $user->authKey=$user->generateAuthKey();
                $user->accessToken;
                if ($user->save()){
                    Yii::$app->getSession()->setFlash('message','Successfully Created User');
                    return $this->redirect('login-user');
                }
            }
        }
        return $this->render('index',compact('users','role','rooms','blocks','user'));
    }

    public function actionDelete($id){
        $post=Users::findOne($id)->delete();
        if($post){
            Yii::$app->getSession()->setFlash('message','Successfully Deleted');
            return $this->redirect('index');
        }
    }

    public function actionView($id){
        $user=Users::findOne($id);
        $role=Role::find()->select(['name','id'])->all();
        $rooms=Room::find()->select(['names','id'])->all();
        $blocks=Blocks::find()->select(['names','id'])->all();
      return  $this->render('view',compact('user','role','rooms','blocks','id'));
    }

    public function actionUpdate(){
       
       $post=Users::findOne($_POST['ids']);
     if($post->load(Yii::$app->request->post())){
        if($post->save()){
            Yii::$app->getSession()->setFlash('message','Successfully Updated');
            return $this->redirect(['index']);
        }
        else{
            Yii::$app->getSession()->setFlash('message','Fail To Post');
          }
        }   
    }



}
