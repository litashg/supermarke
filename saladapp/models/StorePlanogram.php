<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Store_planogram".
 *
 * @property integer $id
 * @property string $path
 * @property string $title
 * @property string $description
 * @property integer $store_id
 *
 * @property Store $store
 */
class StorePlanogram extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_planogram';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'title', 'description'], 'required'],
            [['store_id'], 'safe'],
            [['description'], 'string'],
            [['store_id'], 'integer'],
            [['path'], 'file'],
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
            'description' => Yii::t('app', 'Description'),
            'store_id' => "Store",
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }
}
