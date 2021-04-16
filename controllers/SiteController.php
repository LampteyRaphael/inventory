<?php

namespace app\controllers;

use app\models\Blocks;
use app\models\Brand;
use app\models\Brands;
use app\models\Category;
use app\models\Role;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Item;
use app\models\Request;
use app\models\Room;
use app\models\Rooms;
use app\models\User;
use app\models\RequestSub;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       return $this->render('index');
       
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->redirect(['index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
         Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public  function  actionRegister(){
        $role=Role::find()->select(['name','id'])->all();
        $rooms=Room::find()->select(['names','id'])->all();
        $blocks=Blocks::find()->select(['names','id'])->all();

        $user=new  Users();
        if ($user->load(Yii::$app->request->post())){
            if ($user->validate()){
                $user->username=$_POST['Users']['username'];
                $user->email=$_POST['Users']['email'];
                $user->role_id=$_POST['Users']['role_id'];
                $user->password = $user->setPassword($_POST['Users']['password']);
                $user->authKey=$user->generateAuthKey();
                $user->accessToken;
                if ($user->save()){
                    Yii::$app->getSession()->setFlash('message','Successfully Posted');
                    return  $this->redirect('login');
                }
            }
        }
        return $this->render('register',compact('user','role','blocks','rooms'));
    }

}
