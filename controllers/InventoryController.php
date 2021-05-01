<?php

namespace app\controllers;

use app\models\Blocks;
use app\models\Brand;
use app\models\Category;
use app\models\Item;
use app\models\Room;
use app\models\StatusCategory;
use Yii;
use app\models\Inventory;
use app\models\InventorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

/**
 * InventoryController implements the CRUD actions for Inventory model.
 */
class InventoryController extends Controller
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
     * Lists all Inventory models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin') && Yii::$app->user->can('user-view')){

        $searchModel = new InventorySearch();
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
     * Displays a single Inventory model.
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
     * Creates a new Inventory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin') && Yii::$app->user->can('user-create')){
            $model = new Inventory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('message',  'Successfully Saved');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        }else
        {
            throw new ForbiddenHttpException();
        }
    }

     public function actionImport()
     {
         // $inputFile='Uploads/file.xlsx';
         
       
         try{
            $model=new Inventory();
            $model->file=UploadedFile::getInstance($model,'file');  
            if($model->file !=null){
                $model->file->saveAs('uploads/'.$model->file.''.$model->file->extension);
                $inputFile='uploads/'.$model->file;
            }
            
             $inputFileType= \PHPExcel_IOFactory::identify($inputFile);
             $objReader =    \PHPExcel_IOFactory::createReader($inputFileType);
             $objPHPExcel = $objReader->load($inputFile);
 
         }catch(\Exception $e){
             die('Error');
         }
         $sheet = $objPHPExcel->getSheet(0);
         $highestRow = $sheet->getHighestRow();
         $highestColumn = $sheet->getHighestColumn();
 
         for($row =1; $row <= $highestRow; $row++){
             $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
             if($row==1){
                 continue;
             }

             //entrying new item that is not in the Item table  whiles importing to inventory table
            $item1= new Item();
            $item1->name=$rowData[0][0];
            $item1->save();
 
            //entrying new category that is not in the category table  whiles importing to inventory table
            $category1= new Category();
            $category1->name=$rowData[0][1];
            $category1->save();
 
            //entrying new brand that is not in the brand table  whiles importing to inventory table
            $brand1= new Brand();
            $brand1->name=$rowData[0][4];
            $brand1->save();
 
            //entrying new sub-category that is not in the brand table  whiles importing to inventory table
            $status1= new StatusCategory();
            $status1->name=$rowData[0][6];
            $status1->save();
 
           //entrying new block that is not in the block table  whiles importing to inventory table
            $block1= new Blocks();
            $block1->names=$rowData[0][8];
            $block1->save();
 
           //entrying new room that is not in the room table  whiles importing to inventory table
            $room1= new Room();
            $room1->name=$rowData[0][9];
            $room1->save();

            //entrying new inventory that is not in the inventory table  whiles importing to inventory table
            $invent= new Inventory();
            $items=Item::find()->where(['name'=>$rowData[0][0]])->one();
           
            $invent->item_id= $items->id ?? '';

            $categorys=Category::find()->where(['name'=>$rowData[0][1]])->one();
            $invent->category_id=$categorys->id??'';
            
            $invent->serial=$rowData[0][2];
            $invent->model=$rowData[0][3];

            //calling id only from brand table
            $brands=Brand::find()->where(['name'=>$rowData[0][4]])->one();
            $invent->brand_id=$brands->id??'';
           
            //calling description id only from description table
            $invent->description=$rowData[0][5];
            $statuss=StatusCategory::find()->where(['name'=>$rowData[0][6]])->one();
            $invent->status = $statuss->id??'';
    
            $invent->block_id = Yii::$app->user->identity->block_id;
            $invent->room_id  = Yii::$app->user->identity->room_id;
            $invent->user_id  = Yii::$app->user->identity->id;
            $invent->save();
           //return   print_r($item->getErrors());
         }
         Yii::$app->getSession()->setFlash('message',  'Successfully Imported Excel');
         return $this->redirect(['index']);
       
     }


    /**
     * Updates an existing Inventory model.
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
            Yii::$app->getSession()->setFlash('message',  'Successfully Updated');
            return $this->redirect(['view', 'id' => $model->id]);
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
     * Deletes an existing Inventory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin') && Yii::$app->user->can('user-delete')){

        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('message',  'Successfully Deleted');
        return $this->redirect(['index']);
    }else
    {
        throw new ForbiddenHttpException();
    }
    }

    /**
     * Finds the Inventory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inventory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(Yii::$app->user->can('admin')){

        if (($model = Inventory::findOne($id)) !== null) {
            return $model;
        }
    }else
    {
        throw new ForbiddenHttpException();
    }

    }

    public function actionImportc()
    {
        $model=new Inventory();
        return $this->render('import-create',[
            'model'=>$model,
        ]);

    }

    public function actionImportcc()
    {   
       $model=new Inventory();

       $model->file=UploadedFile::getInstance($model,'file');

       if($model->file !=null){
           $model->file->saveAs('uploads/'.$model->file);

           $inputFile='uploads/'.$model->file;
       }

        try{
            $inputFileType= \PHPExcel_IOFactory::identify($inputFile);
            $objReader =    \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);

        }catch(\Exception $e){
            die('Error');
        }
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for($row =1; $row <= $highestRow; $row++){
            $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
            if($row==1){
                continue;
            }
            $item= new Item();
            $item->name=$rowData[0][0];
            $item->save();

            $category= new Category();
            $category->name=$rowData[0][1];
            $category->save();

            $brand= new Brand();
            $brand->name=$rowData[0][4];
            $brand->save();

            $status= new StatusCategory();
            $status->name=$rowData[0][6];
            $status->save();

            $block1= new Blocks();
            $block1->names=$rowData[0][8];
            $block1->save();

            $room1= new Room();
            $room1->name=$rowData[0][9];
            $room1->save();
    
           //print_r($item->getErrors());
        }

        Yii::$app->getSession()->setFlash('message',  'Successfully Imported Excel');
        return $this->redirect(['index']);

    }






}
