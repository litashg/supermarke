<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_page".
 *
 * @property integer $id
 * @property string $alias
 * @property string $content
 * @property string $breadcrumbs
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'content','breadcrumbs'], 'required'],
            [['content','breadcrumbs'], 'string'],
            [['alias','breadcrumbs'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'content' => 'Content',
            'breadcrumbs'=>'Breadcrumbs'
        ];
    }
}
