<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_main_slider".
 *
 * @property integer $id
 * @property string $image
 *
 */
class MainSlider extends \yii\db\ActiveRecord
{
    public $filename;
    public $images = array();
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_main_slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'image' => 'Image',
        ];
    }

}
