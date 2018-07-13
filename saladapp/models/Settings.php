<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Settings".
 *
 * @property integer $id
 * @property string $title
 * @property double $value
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'value'], 'required'],
            [['value'], 'number'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'value' => Yii::t('app', 'Value'),
        ];
    }
}
