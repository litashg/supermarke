<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Photo_path".
 *
 * @property integer $id
 * @property integer $report_id
 * @property string $path
 *
 * @property Report $report
 */
class PhotoPath extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo_path';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_id', 'path'], 'required'],
            [['report_id'], 'integer'],
            [['path'], 'string', 'max' => 255]
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
            'path' => Yii::t('app', 'Path'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReport()
    {
        return $this->hasOne(Report::className(), ['id' => 'report_id']);
    }
}
