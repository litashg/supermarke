<?php

namespace app\models;

use dektrium\user\models\User;
use Yii;

/**
 * This is the model class for table "Store".
 *
 * @property integer $id
 * @property string $name
 * @property integer $company_id
 * @property string $description
 * @property string $phone
 * @property string $email
 * @property string $address
 *
 * @property StorePlanogram[] $storePlanograms
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'address','custom_id','city','state','company_id'], 'required'],
            [['address2','zip'], 'safe'],
            [['description'], 'string'],
            [['name', 'address','custom_id','city','state'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 55],
            [['email'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Customer #'),
            'company_id' => Yii::t('app', 'Company'),
            'description' => Yii::t('app', 'Notes'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'address' => Yii::t('app', 'Address'),
            'custom_id' => Yii::t('app', 'Store #'),
        ];
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */




    public function getStorePlanograms()
    {
        return $this->hasMany(StorePlanogram::className(), ['store_id' => 'id']);
    }
    public function getStoreCompany()
    {
        return $this->hasOne(Company::className(),['id'=>'company_id']);
    }
}
