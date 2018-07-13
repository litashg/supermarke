<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property string $title
 * @property string $desc
 * @property integer $file_category_id
 */
class DocumentsGuest extends \yii\db\ActiveRecord
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
            [['name', 'path', 'title', 'desc', 'file_category_id'], 'required'],
            [['desc'], 'string'],
            [['file_category_id'], 'integer'],
            [['name', 'path', 'title'], 'string', 'max' => 255]
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
            'path' => Yii::t('app', 'Path'),
            'title' => Yii::t('app', 'Title'),
            'desc' => Yii::t('app', 'Desc'),
            'file_category_id' => Yii::t('app', 'File Category ID'),
        ];
    }
}
