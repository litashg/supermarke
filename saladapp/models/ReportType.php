<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Report_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class ReportType extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_type';
    }



    public function fields()
    {
        return ['id','name', 'description', 'report_group_id','options','report_image','report_title','report_subtitle'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['report_group_id'], 'safe'],
            [['name','report_image','report_title','report_subtitle'], 'string', 'max' => 255]
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
            'description' => Yii::t('app', 'Description'),
            'report_group_id' => "Report group",
        ];
    }

    public function getReportGroupInfo()
    {
        return $this->hasOne(ReportGroup::className(), ['id' => 'report_group_id']);
    }

    public function getOptions(){
        return $this->hasMany(ReportTypeOption::className(), ['report_type_id' => 'id'])->orderBy("order ASC");
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if (!$this->isNewRecord){

                $original = ReportType::find()->where("id=".$this->id)->one();

                if ($this->report_image == ""){
                    $this->report_image = $original->report_image;
                }


            }


            return true;
        }
        return false;
    }
}
