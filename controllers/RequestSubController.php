<?php

namespace app\controllers;

use app\models\Request;
use Yii;
use app\models\RequestSub;
use app\models\RequestSubSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;


/**
 * RequestSubController implements the CRUD actions for RequestSub model.
 */
class RequestSubController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RequestSub models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') && Yii::$app->user->can('user-view')){

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

    /**
     * Displays a single RequestSub model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('admin') && Yii::$app->user->can('user-view')){

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }else
    {
        throw new ForbiddenHttpException();
    }
    }

    /**
     * Creates a new RequestSub model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin') && Yii::$app->user->can('user-create')){
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
                return $this->redirect(['index']);
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

    /**
     * Updates an existing RequestSub model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin') && Yii::$app->user->can('user-update')){

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $model->autOfficer=Yii::$app->user->identity->id;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }


        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else
    {
        throw new ForbiddenHttpException();
    }
    }

    /**
     * Deletes an existing RequestSub model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin') && Yii::$app->user->can('user-delete')){

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
        }else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Finds the RequestSub model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RequestSub the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {        
        if(Yii::$app->user->can('admin')){

        
        if (($model = RequestSub::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }else
    {
        throw new ForbiddenHttpException();
    }
    }
}
