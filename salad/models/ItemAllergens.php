<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_item_allergens".
 *
 * @property integer $id
 * @property integer $allegen_id
 * @property integer $salad_item_id
 *
 * @property Allergens $allegen
 * @property SaladItems $saladItem
 */
class ItemAllergens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_item_allergens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['allegen_id', 'salad_item_id'], 'required'],
            [['allegen_id', 'salad_item_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'allegen_id' => 'Allegen ID',
            'salad_item_id' => 'Salad Item ID',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllegen()
    {
        return $this->hasOne(Allergens::className(), ['id' => 'allegen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaladItem()
    {
        return $this->hasOne(SaladItems::className(), ['id' => 'salad_item_id']);
    }
}
