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
class StoreCabinet extends \yii\db\ActiveRecord
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


            [['name', 'company_id', 'description', 'phone', 'email', 'address'], 'required'],
            [['company_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'address'], 'string', 'max' => 255],
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
            'name' => Yii::t('app', 'Name'),
            'company_id' => Yii::t('app', 'Company ID'),
            'description' => Yii::t('app', 'Description'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'address' => Yii::t('app', 'Address'),
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


}
