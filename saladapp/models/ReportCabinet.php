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
class ReportCabinet extends \yii\db\ActiveRecord
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
            [['type_id', 'user_id', 'store_id', 'status_id'], 'integer'],
            [['comment', 'status_comment','status_date'], 'string'],
            [['creation_date'], 'safe'],
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
            'type_id' => Yii::t('app', 'Type ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'store_id' => Yii::t('app', 'Store ID'),
            'comment' => Yii::t('app', 'Comment'),
            'status_id' => Yii::t('app', 'Status ID'),
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

    public function getTypeinfo(){
//        $type = self::find()->where(['id' => self::user_id ])->all();
//        $type = self::find()->where(['id' => self::user_id ])->all();
        $type = $this->hasOne(ReportType::className(), ['id' => 'type_id']);
//        $data = ReportType::find()->orderBy('id')->all();
        return $type;
    }

    public function getUserinfo(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getStoreinfo(){
        return $this->hasOne(Store::className(),['id'=>'store_id']);
    }

    public function getStatusinfo(){
        return $this->hasOne(Status::className(),['id'=>'status_id']);
    }

    public function getReportvalue(){
        return $this->hasMany(ReportOptionsValue::className(),['report_id'=>'id']);
    }
    public function getReporttypeoption(){

    }

}
