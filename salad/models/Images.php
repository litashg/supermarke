<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_images".
 *
 * @property integer $id
 * @property string $name
 * @property integer $prod_id
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'prod_id'], 'required'],
            [['prod_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
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
            'prod_id' => 'Prod ID',
        ];
    }
}
