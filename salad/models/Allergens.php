<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_allergens".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 *
 * @property ItemAllergens[] $itemAllergens
 */
class Allergens extends \yii\db\ActiveRecord
{
    public $filename;
    public $temp_image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_allergens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'safe']
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
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemAllergens()
    {
        return $this->hasMany(ItemAllergens::className(), ['allegen_id' => 'id']);
    }
}
