<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "documents".
 *
 * @property integer $id
 * @property string $path
 * @property string $title
 * @property string $desc
 * @property integer $file_category_id
 * @property integer $store_id
 * @property integer $company_id
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'title', 'desc', 'file_category_id'], 'required'],
            [['desc'], 'string'],
            [['path'], 'file'],
            [['file_category_id','company_id','store_id'], 'safe'],
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
            'path' => Yii::t('app', 'Path'),
            'title' => Yii::t('app', 'Title'),
            'desc' => Yii::t('app', 'Desc'),
            'file_category_id' => 'File Category',
            'company_id' => 'Company',
            'store_id' => 'Store',

        ];
    }

    public function getFileCategory(){
        return $this->hasOne(FileCategory::className(),['id'=>'file_category_id']);
    }
    public function getStore(){
        return $this->hasOne(Store::className(),['id'=>'store_id']);
    }
    public function getCompany(){
        return $this->hasOne(Company::className(),['id'=>'company_id']);
    }
}
