<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_product_allergens".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $allergen_id
 *
 * @property Product $product
 * @property Allergens $allergen
 */
class ProductAllergens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_product_allergens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'allergen_id'], 'required'],
            [['product_id', 'allergen_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'allergen_id' => 'Allergen ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllergen()
    {
        return $this->hasOne(Allergens::className(), ['id' => 'allergen_id']);
    }
}
