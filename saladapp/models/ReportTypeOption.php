<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Report_type_option".
 *
 * @property integer $id
 * @property integer $report_type_id
 * @property string $title
 * @property integer $report_option_type_id
 */
class ReportTypeOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $value;

    public static function tableName()
    {
        return 'report_type_option';
    }

    public function fields()
    {
        return ['id','title','type','value','order'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_option_type_id','report_type_id'], 'required'],
            [['report_option_type_id'], 'integer'],
            [['report_type_id','order'], 'integer'],
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
            'report_type_id' => Yii::t('app', 'Report Type'),
            'title' => Yii::t('app', 'Title'),
            'report_option_type_id' => "Field type",
        ];
    }

    public function getTypeInfo()
    {
        return $this->hasOne(ReportOptionType::className(), ['id' => 'report_option_type_id']);

       // return $this->hasOne(ReportOptionType::className(), ['id' => 'report_option_type_id']);
    }

    public function getType()
    {
        $report_option_type = ReportOptionType::find()->where("id=".$this->report_option_type_id)->one();
        return $report_option_type->type;

        // return $this->hasOne(ReportOptionType::className(), ['id' => 'report_option_type_id']);
    }

    public function getReportType()
    {
//        $report_type = ReportType::find()->where("id=".$this->report_type_id)->one();
//        return $report_type;

        return $this->hasOne(ReportType::className(), ['id' => 'report_type_id']);

        // return $this->hasOne(ReportOptionType::className(), ['id' => 'report_option_type_id']);
    }


}
