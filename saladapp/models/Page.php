<?php

namespace app\models;
use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property string $body
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Page extends \yii\db\ActiveRecord
{
	const STATUS_DRAFT = 0;
	const STATUS_PUBLISHED = 1;
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%page}}';
	}
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
				TimestampBehavior::className(),
		];
	}
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['alias', 'title', 'body'], 'required'],
				[['alias'], 'unique'],
				[['body'], 'string'],
				[['status'], 'integer'],
				[['alias'], 'string', 'max' => 1024],
				[['title'], 'string', 'max' => 512]
		];
	}
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'id' => Yii::t('page', 'ID'),
				'alias' => Yii::t('page', 'Alias'),
				'title' => Yii::t('page', 'Title'),
				'body' => Yii::t('page', 'Body'),
				'status' => Yii::t('page', 'Active'),
		];
	}
}