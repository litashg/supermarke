<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Report_options".
 *
 * @property integer $id
 * @property integer $report_type_option_id
 * @property string $value
 * @property integer $report_id
 */
class ReportOptionsValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_options_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_type_option_id', 'value', 'report_id'], 'required'],
            [['report_type_option_id', 'report_id'], 'integer'],
            [['value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'report_type_option_id' => Yii::t('app', 'Report Type Option ID'),
            'value' => Yii::t('app', 'Value'),
            'report_id' => Yii::t('app', 'Report ID'),
        ];
    }
}
