<?php
namespace app\models;

use app\models\query\ArticleQuery;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Inflector;
/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property integer $author_id
 * @property integer $updater_id
 * @property integer $category_id
 * @property integer $status
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $author
 * @property User $updater
 * @property ArticleCategory $category
 */
class Article extends \yii\db\ActiveRecord
{
    const STATUS_PUBLISHED = 1;
    const STATUS_DRAFT = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }
    /**
     * @return ArticleQuery
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        TimestampBehavior::className(),
        [
        'class'=>BlameableBehavior::className(),
        'createdByAttribute' => 'author_id',
        'updatedByAttribute' => 'updater_id',
        ],
        [
        'class'=>SluggableBehavior::className(),
        'attribute'=>'title'
        ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['title', 'body'], 'required'],
        [['slug'], 'unique'],
        [['body'], 'string'],
        [['published_at'], 'default', 'value'=>time()],
        [['published_at'], 'filter', 'filter'=>'strtotime'],
        [['category_id'], 'exist', 'targetClass'=>ArticleCategory::className(), 'targetAttribute'=>'id'],
        [['author_id', 'status'], 'integer'],
        [['slug'], 'string', 'max' => 1024],
        [['title'], 'string', 'max' => 512]
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'id' => Yii::t('article', 'ID'),
        'slug' => Yii::t('article', 'Slug'),
        'title' => Yii::t('article', 'Title'),
        'body' => Yii::t('article', 'Body'),
        'author_id' => Yii::t('article', 'Author'),
        'updater_id' => Yii::t('article', 'Updater'),
        'category_id' => Yii::t('article', 'Category'),
        'status' => Yii::t('article', 'Published'),
        'published_at' => Yii::t('article', 'Published At'),
        'created_at' => Yii::t('article', 'Created At'),
        'updated_at' => Yii::t('article', 'Updated At'),
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(\dektrium\user\models\User::className(), ['id' => 'author_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(\dektrium\user\models\User::className(), ['id' => 'updater_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'category_id']);
    }
}