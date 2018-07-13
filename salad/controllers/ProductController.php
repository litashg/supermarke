<?php

namespace app\controllers;

use app\models\ProductAllergens;
use app\models\ProductRelated;
use Yii;
use app\models\Product;
use app\models\Images;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
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
      //  Yii::$app->request->queryParams = Yii::$app->request->post();

        $get = Yii::$app->request->get();
        $post =Yii::$app->request->post();
        Yii::$app->request->queryParams = array_merge($get,$post);
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array

            $image = UploadedFile::getInstance($model, 'image');

           // $path = Yii::$app->params['uploadPath'];
            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';

            if (isset($image)){
                // store the source file name
                $model->filename = $image->name;
                $ext = end((explode(".", $image->name)));
                // generate a unique file name
                $model->prod_img = Yii::$app->security->generateRandomString().".{$ext}";
                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = Yii::$app->params['uploadPath'] . $model->prod_img;
            }
            //            ADD CATEGORIES
            $post = Yii::$app->request->post();
            $categories = $post['Product']['categories'];
            //if(count($categories)==1){
                $model->cat_id =$post['Product']['categories'][0];
           // }



//            ADD CATEGORIES


            if($model->save()){


                //allergens
                if((count($model->allergens))==1) {
                    $alerg_to_item = new ProductAllergens();
                    $alerg_to_item->allergen_id = $model->allergens['0'];
                    $alerg_to_item->product_id = $model->id;
                    $alerg_to_item->save();
                }
                if((count($model->allergens))>1 && (count($model->allergens))!==1){
////all alg_to_item this item all relatives
                    foreach($model->allergens as $sal_alerg){
                        $alerg_to_item = new ProductAllergens();
                        $alerg_to_item->allergen_id = $sal_alerg;
                        $alerg_to_item->product_id = $model->id;
                        $alerg_to_item->save();
                    }
                }
//allergens



//                related products
                if((count($model->rel_prod))==1) {
                    $rel_prod = new ProductRelated();
                    $rel_prod->rel_prod_id = $model->allergens['0'];
                    $rel_prod->prod_id = $model->id;
                    $rel_prod->save();
                }
                if((count($model->rel_prod))>1 && (count($model->rel_prod))!==1){
                    foreach($model->rel_prod as $prod_rel){
                        $rel_prod = new ProductRelated();
                        $rel_prod->rel_prod_id = $prod_rel;
                        $rel_prod->prod_id = $model->id;
                        $rel_prod->save();
                    }
                }
//                related products




//CATEG
                if(count($categories)>1){
                    for($i=1;$i<=(count($categories));$i++){
                        $clon_prod = new Product();
                        $clon_prod->cat_id = $categories[$i];
                        $clon_prod->name = $model->name;
                        $clon_prod->full_desc = $model->full_desc;
                        $clon_prod->desc_title =$model->desc_title;
                        $clon_prod->prod_img=$model->prod_img;
                        $clon_prod->c1_size=$model->c1_size;
                        $clon_prod->c1_container=$model->c1_container;
                        $clon_prod->c1_calories=$model->c1_calories;
                        $clon_prod->c1_calfat=$model->c1_calfat;
                        $clon_prod->c2_totfat_1=$model->c2_totfat_1;
                        $clon_prod->c2_totfat_2=$model->c2_totfat_2;
                        $clon_prod->c2_satfat_1=$model->c2_satfat_1;
                        $clon_prod->c2_satfat_2=$model->c2_satfat_2;
                        $clon_prod->c2_transfat_1=$model->c2_transfat_1;
                        $clon_prod->c2_transfat_2=$model->c2_transfat_2;
                        $clon_prod->c2_cholester_1=$model->c2_cholester_1;
                        $clon_prod->c2_cholester_2=$model->c2_cholester_2;
                        $clon_prod->c2_sod_1=$model->c2_sod_1;
                        $clon_prod->c2_sod_2=$model->c2_sod_2;
                        $clon_prod->c3_totcarb_1=$model->c3_totcarb_1;
                        $clon_prod->c3_totcarb_2=$model->c3_totcarb_2;
                        $clon_prod->c3_dietfib_1=$model->c3_dietfib_1;
                        $clon_prod->c3_dietfib_2=$model->c3_dietfib_2;
                        $clon_prod->c3_sugar_1=$model->c3_sugar_1;
                        $clon_prod->c3_sugar_2=$model->c3_sugar_2;
                        $clon_prod->c3_protein_1=$model->c3_protein_1;
                        $clon_prod->c3_protein_2=$model->c3_protein_2;
                        $clon_prod->c3_calcium=$model->c3_calcium;
                        $clon_prod->c3_iron=$model->c3_iron;
                        $clon_prod->c2_vit_a=$model->c2_vit_a;
                        $clon_prod->c2_vit_c=$model->c2_vit_c;
                        $clon_prod->parent_product=$model->id;
                        $clon_prod->save();
                        //  var_dump($clon_prod);
                        //   die;
                    }
                }
//                CATEG
                if (isset($image)){

                    $image->saveAs($path);
                }
//                MULTI
                $images1 = UploadedFile::getInstances($model, 'images');

                if($images1){

                    foreach($images1 as $getimg){
                        $ext = end((explode(".", $getimg->name)));

                        $img = new Images();
                        $img->prod_id =$model->id;
                        $img->name = Yii::$app->security->generateRandomString().".{$ext}";
                        Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
                        $path = Yii::$app->params['uploadPath'] .  $img->name;
                        $img->save();
                        $getimg->saveAs($path);
                    }
                }
//                MULTI
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
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->categories = $model->getCategories();
        $model->allergens = $model->getAllergens();
        $model->rel_prod = $model->getRelProds();
        $images = Images::findAll(
            ['prod_id' => $id,]
        );
        if ($model->load(Yii::$app->request->post())) {


//            ADD CATEGORIES
            $post = Yii::$app->request->post();
            $categories = $post['Product']['categories'];

            if(count($categories)==1){
                $model->cat_id =$post['Product']['categories'][0];
            }
//            ADD CATEGORIES

            $images1 = UploadedFile::getInstances($model, 'images');
            if($images1){
                foreach($images1 as $getimg){
                    $ext = end((explode(".", $getimg->name)));

                    $img = new Images();
                    $img->prod_id =$model->id;
                    $img->name = Yii::$app->security->generateRandomString().".{$ext}";
                    Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
                    $path = Yii::$app->params['uploadPath'] .  $img->name;
                    $img->save();
                    $getimg->saveAs($path);

                }
            }
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array

            $image = UploadedFile::getInstance($model, 'image');

           // $path = Yii::$app->params['uploadPath'];
            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';

            if (isset($image)){


                // store the source file name
                $model->filename = $image->name;


                $ext = end((explode(".", $image->name)));

                // generate a unique file name
                $model->prod_img = Yii::$app->security->generateRandomString().".{$ext}";

                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = Yii::$app->params['uploadPath'] . $model->prod_img;

            }
           // var_dump($post['Product']['categories']);
           // die;
          //  if(count($categories)>1){
                $model->cat_id =$post['Product']['categories'][0];
         //   }


            //allergens
            //            remove all allergens

            if($model->allergens==''){
                \app\models\ProductAllergens::deleteAll('product_id='.$model->id);
            }
// remove all allergens
//            add allergens
            if((count($model->allergens))==1) {
                \app\models\ProductAllergens::deleteAll('product_id=' . $model->id);
                $alerg_to_item = new ProductAllergens();
                $alerg_to_item->allergen_id = $model->allergens['0'];
                $alerg_to_item->product_id = $model->id;
                $alerg_to_item->save();
            }
            if((count($model->allergens))>1 && (count($model->allergens))!==1){
////all alg_to_item this item all relatives

                \app\models\ProductAllergens::deleteAll('product_id='.$model->id);

                foreach($model->allergens as $sal_alerg){
                    $alerg_to_item = new ProductAllergens();
                    $alerg_to_item->allergen_id = $sal_alerg;
                    $alerg_to_item->product_id = $model->id;
                    $alerg_to_item->save();
                }
            }
//            add allergens

//allergens

            //RELATED PRODUCTS
            //            remove all RELATED PRODUCTS


            if($model->rel_prod==''){
                \app\models\ProductRelated::deleteAll('prod_id='.$model->id);
            }
// remove all RELATED PRODUCTS
//            add RELATED PRODUCTS
            if((count($model->rel_prod))==1) {
                \app\models\ProductRelated::deleteAll('prod_id=' . $model->id);
                $rel_prods = new ProductRelated();
                $rel_prods->rel_prod_id = $model->rel_prod['0'];
                $rel_prods->prod_id = $model->id;
                $rel_prods->save();
            }
            if((count($model->rel_prod))>1 && (count($model->rel_prod))!==1){
////all RELATED PRODUCTSs

                \app\models\ProductRelated::deleteAll('prod_id='.$model->id);

                foreach($model->rel_prod as $sal_alerg){
                    $rel_prods = new ProductRelated();
                    $rel_prods->rel_prod_id = $sal_alerg;
                    $rel_prods->prod_id = $model->id;
                    $rel_prods->save();
                }
            }
//            add RELATED PRODUCTS

//RELATED PRODUCTS








            if($model->save()){
//CATEG
                \app\models\Product::deleteAll('parent_product='.$model->id);
                if(count($categories)>1){
                   // var_dump($categories);
                  //  die;

                    for($i=1;$i<=(count($categories));$i++){
                        $clon_prod = new Product();
                        $clon_prod->cat_id = $categories[$i];
                        $clon_prod->name = $model->name;
                        $clon_prod->full_desc = $model->full_desc;
                        $clon_prod->desc_title =$model->desc_title;
                        $clon_prod->prod_img=$model->prod_img;
                        $clon_prod->c1_size=$model->c1_size;
                        $clon_prod->c1_container=$model->c1_container;
                        $clon_prod->c1_calories=$model->c1_calories;
                        $clon_prod->c1_calfat=$model->c1_calfat;
                        $clon_prod->c2_totfat_1=$model->c2_totfat_1;
                        $clon_prod->c2_totfat_2=$model->c2_totfat_2;
                        $clon_prod->c2_satfat_1=$model->c2_satfat_1;
                        $clon_prod->c2_satfat_2=$model->c2_satfat_2;
                        $clon_prod->c2_transfat_1=$model->c2_transfat_1;
                        $clon_prod->c2_transfat_2=$model->c2_transfat_2;
                        $clon_prod->c2_cholester_1=$model->c2_cholester_1;
                        $clon_prod->c2_cholester_2=$model->c2_cholester_2;
                        $clon_prod->c2_sod_1=$model->c2_sod_1;
                        $clon_prod->c2_sod_2=$model->c2_sod_2;
                        $clon_prod->c3_totcarb_1=$model->c3_totcarb_1;
                        $clon_prod->c3_totcarb_2=$model->c3_totcarb_2;
                        $clon_prod->c3_dietfib_1=$model->c3_dietfib_1;
                        $clon_prod->c3_dietfib_2=$model->c3_dietfib_2;
                        $clon_prod->c3_sugar_1=$model->c3_sugar_1;
                        $clon_prod->c3_sugar_2=$model->c3_sugar_2;
                        $clon_prod->c3_protein_1=$model->c3_protein_1;
                        $clon_prod->c3_protein_2=$model->c3_protein_2;
                        $clon_prod->c3_calcium=$model->c3_calcium;
                        $clon_prod->c3_iron=$model->c3_iron;
                        $clon_prod->c2_vit_a=$model->c2_vit_a;
                        $clon_prod->c2_vit_c=$model->c2_vit_c;
                        $clon_prod->parent_product=$model->id;
                        $clon_prod->save();
                      //  var_dump($clon_prod);
                     //   die;
                    }
                }
//                CATEG





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
            'images'=> $images,
        ]);

        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        */
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        \app\models\Product::deleteAll('parent_product='.$id);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
