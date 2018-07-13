<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "Company".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $phone
 * @property string $address
 * @property string $email
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'phone', 'address', 'email'], 'required'],
            [['description'], 'string'],

            [['name', 'email'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 55],
            [['logo_path'],'file'],
            [['address'], 'string', 'max' => 255]
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
            'logo_path' => "Company Logo",
            'description' => Yii::t('app', 'Description'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    public function getStoresByCompany($company_id){
        return $this->hasMany(Store::className(),['id'=>$company_id]);
    }
    public function getLogo($company_id){
        $company =  Company::find()->where('id='.$company_id)->one();
        $path = '/img/company_logo/'.$company->logo_path;
        return $path;
    }
}
