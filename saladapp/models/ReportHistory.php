<?php

namespace app\models;

use dektrium\user\models\User;
use Yii;

/**
 * This is the model class for table "report_history".
 *
 * @property integer $id
 * @property integer $report_id
 * @property integer $send_datetime
 * @property string $status_id
 * @property string $status_comment
 */
class ReportHistory extends \yii\db\ActiveRecord
{

    public $username;
    public $admin;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_id', 'send_datetime', 'status_id'], 'required'],
            [['report_id'], 'integer'],
            [['status_id', 'send_datetime','status_comment'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'report_id' => Yii::t('app', 'Report ID'),
            'send_datetime' => Yii::t('app', 'Send Datetime'),
            'status_id' => 'Status',
            'status_comment' => Yii::t('app', 'Status Comment')
        ];
    }
    public function getReportInfo(){
        return $this->hasOne(Report::className(),['id'=>'report_id']);
    }
    public function getStatusInfo(){
        return $this->hasOne(Status::className(),['id'=>'status_id']);
    }

}
