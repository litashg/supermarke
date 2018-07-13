<?php

namespace app\models;


use Yii;
use app\models\ItemAllergens;
use app\models\Allergens;

/**
 * This is the model class for table "t_salad_items".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property string $full_desc
 * @property string $image
 * @property string $ingredients
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
 * @property integer $visible
 * @property integer $position
 */
class SaladItems extends \yii\db\ActiveRecord
{
    public $allergens=[];
    public $allergensName=[];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_salad_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent_id', ], 'required'],
            [[  'c1_size','c1_container','c1_calories', 'c1_calfat', 'c2_totfat_1', 'c2_totfat_2', 'c2_satfat_1', 'c2_satfat_2', 'c2_transfat_1', 'c2_transfat_2', 'c2_cholester_1', 'c2_cholester_2', 'c2_sod_1', 'c2_sod_2', 'c3_totcarb_1', 'c3_totcarb_2', 'c3_dietfib_1', 'c3_dietfib_2', 'c3_sugar_1', 'c3_sugar_2', 'c3_protein_1', 'c3_protein_2', 'c3_calcium', 'c3_iron', 'c2_vit_a', 'c2_vit_c'], 'string'],
            [['parent_id', ], 'integer'],
            [['full_desc','ingredients'], 'string'],
            [['name',], 'string', 'max' => 255],
            [['image','allergens','visible','allergensName','position'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
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
            'parent_id' => 'Parent ID',
            'full_desc' => 'Full Desc',
            'image' => 'Image',
            'ingredients' => 'Ingredients',
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
            'visible' => 'Is visible ?'
        ];
    }

    public function getAllergens()
    {
        $all_allergens = \app\models\ItemAllergens::find()->select('allegen_id')->where('salad_item_id='.$this->id)->asArray()->all();
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
        $all_allergens = \app\models\ItemAllergens::find()->select('allegen_id')->where('salad_item_id='.$this->id)->asArray()->all();
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

}
