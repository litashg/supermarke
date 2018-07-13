<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Report_option_type".
 *
 * @property integer $id
 * @property string $type
 * @property string $value
 */
class ReportOptionType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_option_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 200],
            [['value'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'value' => Yii::t('app', 'Value'),
        ];
    }
}
