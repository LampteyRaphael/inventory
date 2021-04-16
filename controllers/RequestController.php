<?php

namespace app\controllers;

use Yii;
use app\models\Request;
use app\models\RequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\RequestSub;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\web\ForbiddenHttpException;
/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller
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
     * Lists all Request models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Request model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Request();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Request model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
          $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Request model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin'))
        {
            $model=RequestSub::find()->where(['id'=>$id])->one();
            $model->delete();
            Yii::$app->getSession()->setFlash('message',  'Successfully Deleted');
           return $this->redirect(['pending']);
    }else
        {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Finds the Request model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Request the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Request::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    public function actionPending(){

        if(Yii::$app->user->can('admin')){

            $query=RequestSub::find()->where(['remark'=>2]);

            $dataProvider=new ActiveDataProvider([
                'query'=>$query,
                'pagination'=>[
                    'pageSize'=>20,
                ],
                'sort'=>[
                    'defaultOrder'=>['id'=>SORT_ASC]
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

       if(Yii::$app->user->can('admin')){
          
        $query=RequestSub::find()->where(['remark'=>3]);

        $dataProvider=new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>20,
            ],
            'sort'=>[
                'defaultOrder'=>['created_at'=>SORT_ASC]
                
                ]
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
       if(Yii::$app->user->can('admin'))
       {
           $query=RequestSub::find()->where(['remark'=>1]);
           $dataProvider=new ActiveDataProvider([
               'query'=>$query,
               'pagination'=>[
                   'pageSize'=>20,
               ],
               'sort'=>[
                   'defaultOrder'=>['updated_at'=>SORT_ASC]
               ]
           ]);
       
          return $this->render('approved',[
              'dataProvider'=>$dataProvider,
          ]);
       }else
       {
           throw new ForbiddenHttpException();
       }
   }


    public function actionApprove($id){
        if(Yii::$app->user->can('admin')) {
                $model = RequestSub::find()->where(['id'=>$id])->one();
                $model->remark=1;
                $model->autOfficer=Yii::$app->user->identity->id;
                $model->updated_at=date('Y-m-d h:i:s');
                $model->save();
            Yii::$app->getSession()->setFlash('message',  'Successfully Approved');
            return $this->redirect(['request-sub/index', 'id' => $model->id]);
        }else {
            throw new ForbiddenHttpException();
        }
    }




    public function actionReject($id){
        if(Yii::$app->user->can('admin')) {
                $model = RequestSub::find()->where(['id'=>$id])->one();
                $model->remark=3;
                $model->autOfficer=Yii::$app->user->identity->id;
                $model->updated_at=date('Y-m-d h:i:s');
                $model->save();
            Yii::$app->getSession()->setFlash('message',  'Successfully Approved');
            return $this->redirect(['request-sub/index', 'id' => $model->id]);
        }else {
            throw new ForbiddenHttpException();
        }
    }





   




}
