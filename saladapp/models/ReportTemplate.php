<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_template".
 *
 * @property integer $id
 * @property string $name
 * @property integer $report_group_id
 * @property integer $report_type_id
 * @property integer $store_id
 * @property integer $report_type_option_id
 * @property string $description
 */
class ReportTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'report_group_id', 'report_type_id', 'store_id', 'report_type_option_id', 'description'], 'required'],
            [['report_group_id', 'report_type_id', 'store_id', 'report_type_option_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'report_group_id' => Yii::t('app', 'Report Group ID'),
            'report_type_id' => Yii::t('app', 'Report Type ID'),
            'store_id' => Yii::t('app', 'Store ID'),
            'report_type_option_id' => Yii::t('app', 'Report Type Option ID'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
