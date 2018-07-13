<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_product_related".
 *
 * @property integer $id
 * @property integer $prod_id
 * @property integer $rel_prod_id
 *
 * @property Product $relProd
 * @property Product $prod
 */
class ProductRelated extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_product_related';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prod_id', 'rel_prod_id'], 'required'],
            [['prod_id', 'rel_prod_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prod_id' => 'Prod ID',
            'rel_prod_id' => 'Rel Prod ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelProd()
    {
        return $this->hasOne(Product::className(), ['id' => 'rel_prod_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Product::className(), ['id' => 'prod_id']);
    }
}
