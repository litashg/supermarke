<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_product".
 *
 * @property integer $id
 * @property string $name
 * @property integer $cat_id
 * @property string $desc_title
 * @property string $full_desc
 * @property string $prod_img
 * @property integer $c1_size
 * @property integer $c1_container
 * @property integer $c1_calories
 * @property integer $c1_calfat
 * @property integer $c2_totfat_1
 * @property integer $c2_totfat_2
 * @property integer $c2_satfat_1
 * @property integer $c2_satfat_2
 * @property integer $c2_transfat_1
 * @property integer $c2_transfat_2
 * @property integer $c2_cholester_1
 * @property integer $c2_cholester_2
 * @property integer $c2_sod_1
 * @property integer $c2_sod_2
 * @property integer $c3_totcarb_1
 * @property integer $c3_totcarb_2
 * @property integer $c3_dietfib_1
 * @property integer $c3_dietfib_2
 * @property integer $c3_sugar_1
 * @property integer $c3_sugar_2
 * @property integer $c3_protein_1
 * @property integer $c3_protein_2
 * @property integer $c3_calcium
 * @property integer $c3_iron
 * @property integer $c2_vit_a
 * @property integer $c2_vit_c
 * @property integer $parent_product
 * @property string $ingredients
 * @property string $alias
 * @property integer $visible
 *
 * @property string $shelf_life
 * @property string $standard_item_number
 * @property string $standard_pack_size
 * @property string $case_dimensions
 * @property string $gross_weight
 * @property string $ti_hi
 * @property string $pack_size
 * @property string $item_number
 *
 * @property Category $cat
 */
class Product extends \yii\db\ActiveRecord
{
    public $image;
    public $images;
    public $filename;
    public $categories = array();
    public $allergens=[];
    public $allergensName=[];

    public $rel_prod=[];
    public $rel_prod_name=[];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_product';
    }


    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['update'] = ['alias'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'cat_id', 'desc_title', 'full_desc', ], 'required'],
            [['cat_id', 'c1_size', 'c1_container', 'c1_calories', 'c1_calfat', 'c2_totfat_1', 'c2_totfat_2', 'c2_satfat_1', 'c2_satfat_2', 'c2_transfat_1', 'c2_transfat_2', 'c2_cholester_1', 'c2_cholester_2', 'c2_sod_1', 'c2_sod_2', 'c3_totcarb_1', 'c3_totcarb_2', 'c3_dietfib_1', 'c3_dietfib_2', 'c3_sugar_1', 'c3_sugar_2', 'c3_protein_1', 'c3_protein_2', 'c3_calcium', 'c3_iron', 'c2_vit_a', 'c2_vit_c'], 'string'],
            [['shelf_life','standard_item_number','standard_pack_size','case_dimensions','gross_weight','ti_hi'], 'string'],
            [['name','prod_img','pack_size','item_number','alias'], 'string', 'max' => 255],
            [['image','parent_product','alias'], 'safe'],
            [['images','visible','is_featured'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['full_desc','prod_img','desc_title','ingredients','allergens','allergensName','alias','rel_prod','rel_prod_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'cat_id' => 'Cat ID',
            'desc_title' => 'Desc Title',
            'full_desc' => 'Full Desc',
            'prod_img' => 'Main image',
            'c1_size' => 'C1 Size',
            'c1_container' => 'C1 Container',
            'c1_calories' => 'C1 Calories',
            'c1_calfat' => 'C1 Calfat',
            'c2_totfat_1' => 'C2 Totfat 1',
            'c2_totfat_2' => 'C2 Totfat 2',
            'c2_satfat_1' => 'C2 Satfat 1',
            'c2_satfat_2' => 'C2 Satfat 2',
            'c2_transfat_1' => 'C2 Transfat 1',
            'c2_transfat_2' => 'C2 Transfat 2',
            'c2_cholester_1' => 'C2 Cholester 1',
            'c2_cholester_2' => 'C2 Cholester 2',
            'c2_sod_1' => 'C2 Sod 1',
            'c2_sod_2' => 'C2 Sod 2',
            'c3_totcarb_1' => 'C3 Totcarb 1',
            'c3_totcarb_2' => 'C3 Totcarb 2',
            'c3_dietfib_1' => 'C3 Dietfib 1',
            'c3_dietfib_2' => 'C3 Dietfib 2',
            'c3_sugar_1' => 'C3 Sugar 1',
            'c3_sugar_2' => 'C3 Sugar 2',
            'c3_protein_1' => 'C3 Protein 1',
            'c3_protein_2' => 'C3 Protein 2',
            'c3_calcium' => 'C3 Calcium',
            'c3_iron' => 'C3 Iron',
            'c2_vit_a' => 'C2 Vit A',
            'c2_vit_c' => 'C2 Vit C',
            'ingredients' => 'Ingredients',
            'shelf_life'=>'Shelf life',
            'standard_item_number'=>'Standard item number',
            'standard_pack_size'=>'Standard pack size',
            'case_dimensions'=>'Case dimensions',
            'gross_weight'=>'Gross weight',
            'ti_hi'=>'Ti/Hi',
            'pack_size'=>'Pack size',
            'item_number'=>'Item number',
            'alias' => 'Product alias',
            'visible' => 'Is visible ?',
            'is_featured' => 'Is featured ?'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }

    public function getCategories(){
        $all_cats = \app\models\Product::find()->select('cat_id')
            ->where('id = :userid', [':userid' => $this->id])
	    ->orWhere('parent_product = :primary_user', [':primary_user' => $this->id])
            ->asArray()->all();

        $cat_s = [];
        foreach($all_cats as $cat){
            $cat_s[]= $cat['cat_id'];
        }
//ar_dump($cat_s);
       // die;
        return $this->categories =$cat_s;
    }

    public function getAllergens()
    {
        $all_allergens = \app\models\ProductAllergens::find()->select('allergen_id')->where('product_id='.$this->id)->asArray()->all();
        $str_ing = [];
        foreach($all_allergens as $name =>$val){
            foreach($val as $al_n=>$al_id){
                $th =  array_values(\app\models\Allergens::find()->where('id = :a_id', [':a_id' => $al_id])->select('id')->asArray()->all());
                foreach($th as $k=>$v) {
                    foreach ($v as $c => $k) {
                        $str_ing [] = $k;
                    }
                }
            }
        }

        return $this->allergens =$str_ing;
    }

    public function getAllergensName()
    {
        $all_allergens = \app\models\ProductAllergens::find()->select('allergen_id')->where('product_id='.$this->id)->asArray()->all();
        $str_ing = [];
        foreach($all_allergens as $name =>$val){
            foreach($val as $al_n=>$al_id){
                $th =  array_values(\app\models\Allergens::find()->where('id = :a_id', [':a_id' => $al_id])->select(['name', 'id'])->asArray()->all());
                foreach($th as $k=>$v) {
                    foreach ($v as $c => $k) {
                        $str_ing [] = $k;
                    }
                }
            }
        }

        return $this->allergensName =$str_ing;
    }

    public function getAllergensModel()
    {
        $all_allergens = \app\models\ProductAllergens::find()->select('allergen_id')->where('product_id='.$this->id)->asArray()->all();
        $str_ing = [];
        foreach($all_allergens as $name =>$val){
            foreach($val as $al_n=>$al_id){
                $th =  array_values(\app\models\Allergens::find()->where('id = :a_id', [':a_id' => $al_id])->asArray()->all());
                        $str_ing [] = $th;
            }
        }
        return $str_ing;
    }

//related products

    public function getRelProds()
    {
        $all_allergens = \app\models\ProductRelated::find()->select('rel_prod_id')->where('prod_id='.$this->id)->asArray()->all();
        $str_ing = [];
        foreach($all_allergens as $name =>$val){
            foreach($val as $al_n=>$al_id){
                $th =  array_values(\app\models\Product::find()->where('id = :a_id', [':a_id' => $al_id])->select('id')->asArray()->all());
                foreach($th as $k=>$v) {
                    foreach ($v as $c => $k) {
                        $str_ing [] = $k;
                    }
                }
            }
        }

        return $this->rel_prod =$str_ing;
    }

    public function getRelProdsName()
    {
        $all_allergens = \app\models\ProductRelated::find()->select('rel_prod_id')->where('prod_id='.$this->id)->asArray()->all();
        $str_ing = [];
        foreach($all_allergens as $name =>$val){
            foreach($val as $al_n=>$al_id){
                $th =  array_values(\app\models\Product::find()->where('id = :a_id', [':a_id' => $al_id])->select(['name', 'id'])->asArray()->all());
                foreach($th as $k=>$v) {
                    foreach ($v as $c => $k) {
                        $str_ing [] = $k;
                    }
                }
            }
        }

        return $this->rel_prod_name =$str_ing;
    }

    public function getRelProductsModel()
    {
        $all_allergens = \app\models\ProductRelated::find()->select('rel_prod_id')->where('prod_id='.$this->id)->asArray()->all();
        $str_ing = [];
        foreach($all_allergens as $name =>$val){
            foreach($val as $al_n=>$al_id){
                $th =  array_values(\app\models\Product::find()->where('id = :a_id', [':a_id' => $al_id])->asArray()->all());
                $str_ing [] = $th;
            }
        }
        return $str_ing;
    }

    public function beforeSave($insert)
    {
        if(!$this->alias){
            $nae_arr = explode(" ", $this->name);
            $alias = '';
            for($i=0;$i<=count($nae_arr)-1;$i++){
                if($i == count($nae_arr)-1){
                    $alias.=  strtolower($nae_arr[$i]);
                }else{
                    $alias.=  strtolower($nae_arr[$i]).'_';
                }
            }
            $this->alias = $alias;
        }
        return parent::beforeSave($insert);

    }

}
