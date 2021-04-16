<?php

namespace app\controllers;

use app\models\Blocks;
use app\models\Brand;
use app\models\Category;
use app\models\Item;
use app\models\Request;
use app\models\RequestSub;
use app\models\RequestSubSearch;
use app\models\Room;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use app\models\User;
use yii\data\ActiveDataProvider;

class UserRequestController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index','view','update','delete','create','pending','dash','rejected','approved'],
                'rules' => [
                    [
                        'actions' => ['index','logout','create','delete','view','update','register','pending','dash','rejected','approved'],
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
        if(Yii::$app->user->can('user')){
        $searchModel = new RequestSubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }else
    {
        throw new ForbiddenHttpException();
    }
    }

    public function actionCreate()
    {
        if(Yii::$app->user->can('user')){
            $request=new Request();
            $model1 = new RequestSub();
               $request->user_id=Yii::$app->user->identity->id;
               $request->save();
               if ($model1->load(Yii::$app->request->post())) {
                    for($count=0; $count<=count($_POST['RequestSub']['item_id']); $count++){
                        $model = new RequestSub();
                        $model->item_id= $_POST['RequestSub']['item_id'][$count]??'';
                        $model->quantity=$_POST['RequestSub']['quantity'][$count]??''; 
                        $model->request_id=$request->id;
                        $model->user_id=Yii::$app->user->identity->id;
                        $model->remark=$_POST['RequestSub']['remark']??'';
                        $model->save();
                    }
                    Yii::$app->getSession()->setFlash('message',  'Successfully Saved');
                    return $this->redirect(['pending']);
               }else{
                return $this->render('create', [
                    'model' => $model1,
                ]);
               }
            }else
            {
                throw new ForbiddenHttpException();
            }
    }

    public function actionDash()
    {
        if(Yii::$app->user->can('user')){
            $request=RequestSub::find()->where(['user_id'=>Yii::$app->user->identity->id])->count();
            $approved=RequestSub::find()->where(['user_id'=>Yii::$app->user->identity->id])->where(['remark'=>1])->count();
            $pending=RequestSub::find()->where(['user_id'=>Yii::$app->user->identity->id])->where(['remark'=>2])->count();
            $reject=RequestSub::find()->where(['user_id'=>Yii::$app->user->identity->id])->where(['remark'=>3])->count();
            $rooms=Room::find()->count();
            $brands=Brand::find()->count();
            $items=Item::find()->count();
            $category=Category::find()->count();
            $blocks=Blocks::find()->count();
        return $this->render('dash',compact('request','approved','pending','reject','rooms','brands','items','category','blocks'));
    }else
    {
        throw new ForbiddenHttpException();
    }

    }

    public function actionPending(){
        
         if(Yii::$app->user->can('user')){

        $query=RequestSub::find()->andwhere(['user_id'=>Yii::$app->user->identity->id])->andwhere(['remark'=>2]);   
        $dataProvider=new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>20,
            ],
            'sort'=>[
                'defaultOrder'=>['created_at'=>SORT_ASC]
            ]
        ]);
           return $this->render('pending',[
               'dataProvider'=>$dataProvider,
           ]);
        }else
        {
            throw new ForbiddenHttpException();
        }
    }

    public function actionRejected(){
        //selecting rejected request
        if(Yii::$app->user->can('user')){

            $query=RequestSub::find()->andwhere(['user_id'=>Yii::$app->user->identity->id])->andwhere(['remark'=>3]);

            $dataProvider=new ActiveDataProvider([
                'query'=>$query,
                'pagination'=>[
                    'pageSize'=>20,
                ],
                'sort'=>[
                    'defaultOrder'=>['created_at'=>SORT_ASC]
                ],
            ]);
               return $this->render('rejected',[

                'dataProvider'=>$dataProvider,
               ]);
            }else
            {
                throw new ForbiddenHttpException();
            }
    }

    public function actionApproved(){
        if(Yii::$app->user->can('user'))
        {
        $query=RequestSub::find()->andwhere(['user_id'=>Yii::$app->user->identity->id])->andwhere(['remark'=>1]); 
        
        $dataProvider=new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>20,
            ],
            'sort'=>[
                'defaultOrder'=>['created_at'=>SORT_DESC]
            ],
        ]);
           return $this->render('approved',[
               'dataProvider'=>$dataProvider,
            //    'searchModel' => $query,
           ]);
        }else
        {
            throw new ForbiddenHttpException();
        }
    }



    public function actionDelete($id)
    {
        if(Yii::$app->user->can('user') && Yii::$app->user->can('user-delete'))
        {
            $model=RequestSub::find()->where(['id'=>$id])->andWhere(['user_id'=>Yii::$app->user->identity->id])->one();
            $model->delete();
            Yii::$app->getSession()->setFlash('message',  'Successfully Deleted');
        return $this->redirect(['pending']);
    }else
        {
            throw new ForbiddenHttpException();
        }
    }


    public function actionReset()
    {
       
        if(Yii::$app->user->can('user') || Yii::$app->user->can('admin'))
        {       $model=new User();
            if ($model->load(Yii::$app->request->post())) {
                $model1=User::find()->Where(['id'=>Yii::$app->user->identity->id])->one();
                $model1->password=$model->setPassword($_POST['User']['password']);
                $model1->save();
                Yii::$app->getSession()->setFlash('message',  'Successfully Reset Password');
                 return $this->redirect(['reset', 'id' => $model->id]);
            }

        return $this->render('reset',[
            'model'=>$model,
        ]);

        }else{
            throw new ForbiddenHttpException();
        }
        
    }

}
