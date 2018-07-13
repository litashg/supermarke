<?php

namespace app\models;

use dektrium\user\models\User;
use Yii;

/**
 * This is the model class for table "Report".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $store_id
 * @property string $comment
 * @property integer $status_id
 * @property string $status_comment
 * @property string $status_date
 * @property string $creation_date
 * @property string $transaction
 *
 * @property PhotoPath[] $photoPaths
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'report';
    }

    public function fields()
    {
        return ['id','status_comment', 'creation_date','status_date', 'status','type'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'user_id', 'comment', 'creation_date'], 'required'],
            [['type_id', 'user_id', 'store_id', 'status_id','creation_date'], 'safe'],
            [['comment', 'status_comment','status_date'], 'string'],
            [['transaction'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type_id' => 'Report type',
            'user_id' => 'User',
            'store_id' => 'Store',
            'comment' => Yii::t('app', 'Comment'),
            'status_id' => 'Status',
            'status_comment' => Yii::t('app', 'Checker Comment'),
            'creation_date' => Yii::t('app', 'Creation Date'),
            'transaction' => Yii::t('app', 'Transaction'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getPhotoPaths()
    {
        return $this->hasMany(PhotoPath::className(), ['report_id' => 'id']);
    }

    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    public function getType()
    {
        return $this->hasOne(ReportType::className(), ['id' => 'type_id']);
    }

    public function getTypeInfo(){
        $type = $this->hasOne(ReportType::className(), ['id' => 'type_id']);
        return $type;
    }

    public function getUserInfo(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getStoreInfo(){
        return $this->hasOne(Store::className(),['id'=>'store_id']);
    }

    public function getStatusInfo(){
        return $this->hasOne(Status::className(),['id'=>'status_id']);
    }

    public function getReportValue(){
        return $this->hasMany(ReportOptionsValue::className(),['report_id'=>'id']);
    }


}
