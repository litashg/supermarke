<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "file_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $is_global
 * @property integer $for_shop
 * @property integer $for_guest
 */
class FileCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'name'], 'required'],
            [['id', 'is_global', 'for_shop', 'for_guest'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['parent_id', 'description'],'safe']
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
            'parent_id' => Yii::t('app', 'Parent ID'),
            'is_global' => Yii::t('app', 'Is Global'),
            'for_shop' => Yii::t('app', 'For Shop'),
            'for_guest' => Yii::t('app', 'For Guest'),
            'description'=>'Description'

        ];
    }

    public function getParentCategory(){
        return $this->hasOne(FileCategory::className(),['id'=>'parent_id']);
    }
    public function getCompany(){
        return $this->hasOne(Company::className(),['id'=>'company_id']);
    }
}
