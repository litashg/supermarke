<?php

namespace app\controllers;

use app\models\ItemAllergens;
use Yii;
use app\models\SaladItems;
use app\models\SaladItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SaladItemsController implements the CRUD actions for SaladItems model.
 */
class SaladItemsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => array(
                'class' => \yii\filters\AccessControl::className(),
                'rules' => array(

                    array(
                        'allow' => true,
                        'actions' => array('index', 'view','create','update','delete'),
                        'roles' => array('admin')
                    ),
                    array(
                        'allow' => false
                    ),
                )
            )
        ];
    }

    /**
     * Lists all SaladItems models.
     * @return mixed
     */
    public function actionIndex()
    {
        //        DELETE ITEMS
        if (Yii::$app->request->post('selection')) {
            foreach(Yii::$app->request->post('selection') as $id) {
                $this->findModel($id)->delete();
            }
        }



//        DELETE ITEMS

        $get = Yii::$app->request->get();
        $post =Yii::$app->request->post();
        Yii::$app->request->queryParams = array_merge($get,$post);
       // Yii::$app->request->queryParams = Yii::$app->request->post();
        $searchModel = new SaladItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SaladItems model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SaladItems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SaladItems();

        if ($model->load(Yii::$app->request->post())) {
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $image = UploadedFile::getInstance($model, 'image');
            $path = Yii::$app->params['uploadPath'];


            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';

            if (isset($image)){



                // store the source file name
                //$model->filename = $image->name;



                $ext = end((explode(".", $image->name)));

                // generate a unique file name
                $model->image = Yii::$app->security->generateRandomString().".{$ext}";

                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = Yii::$app->params['uploadPath'] . $model->image;

            }


            if($model->save()){
                //allergens
                if((count($model->allergens))==1) {
                    $alerg_to_item = new ItemAllergens();
                    $alerg_to_item->allegen_id = $model->allergens['0'];
                    $alerg_to_item->salad_item_id = $model->id;
                    $alerg_to_item->save();
                }
                if((count($model->allergens))>1 && (count($model->allergens))!==1){
////all alg_to_item this item all relatives
                    foreach($model->allergens as $sal_alerg){
                        $alerg_to_item = new ItemAllergens();
                        $alerg_to_item->allegen_id = $sal_alerg;
                        $alerg_to_item->salad_item_id = $model->id;
                        $alerg_to_item->save();
                    }
                }
//allergens
                if (isset($image)){

                    $image->saveAs($path);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // error in saving model
            }
        }
            return $this->render('create', [
                'model' => $model,
            ]);
        }


    /**
     * Updates an existing SaladItems model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->allergens = $model->getAllergens();
        $image_name = $model->image;

        if ($model->load(Yii::$app->request->post())) {


            $model->image = $image_name;
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $image = UploadedFile::getInstance($model, 'image');
            $path = Yii::$app->params['uploadPath'];



            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';

            if ($image){



                // store the source file name
                //$model->filename = $image->name;



                $ext = end((explode(".", $image->name)));

                // generate a unique file name
                $model->image = Yii::$app->security->generateRandomString().".{$ext}";

                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = Yii::$app->params['uploadPath'] . $model->image;

            }

            //allergens
            //            remove all allergens

            if($model->allergens==''){
                 \app\models\ItemAllergens::deleteAll('salad_item_id='.$model->id);
            }
// remove all allergens
//            add allergens
            if((count($model->allergens))==1) {
                \app\models\ItemAllergens::deleteAll('salad_item_id=' . $model->id);
                $alerg_to_item = new ItemAllergens();
                $alerg_to_item->allegen_id = $model->allergens['0'];
                $alerg_to_item->salad_item_id = $model->id;
                $alerg_to_item->save();
            }
            if((count($model->allergens))>1 && (count($model->allergens))!==1){
////all alg_to_item this item all relatives

                 \app\models\ItemAllergens::deleteAll('salad_item_id='.$model->id);

                    foreach($model->allergens as $sal_alerg){
                            $alerg_to_item = new ItemAllergens();
                            $alerg_to_item->allegen_id = $sal_alerg;
                            $alerg_to_item->salad_item_id = $model->id;
                            $alerg_to_item->save();
                    }
            }
//            add allergens

//allergens
            if($model->save()){
                if (isset($image)){

                    $image->saveAs($path);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // error in saving model
            }
        }
            return $this->render('update', [
                'model' => $model,
            ]);

    }

    /**
     * Deletes an existing SaladItems model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
//        allergens
        \app\models\ItemAllergens::deleteAll('salad_item_id=' . $id);
//        allergens
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SaladItems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SaladItems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SaladItems::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
