<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property string $short_desc
 * @property string $full_desc
 * @property string $cat_img
 * @property string $text
 * @property integer $visible
 * @property string $link
 * @property string $cat_icon
 * @property string $alias
 * @property Category $parent
 * @property Category[] $categories
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    public $image;
    public $filename;
    public $icon;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'short_desc', 'full_desc'], 'required'],
            [['parent_id'], 'integer'],
            [['short_desc','link'], 'string'],
            [['name', 'cat_img','cat_icon'], 'string', 'max' => 255],
            [['image','cat_icon','text','full_desc','alias','short_desc', 'full_desc','visible'], 'safe'],
            [['image','cat_icon'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent category',
            'short_desc' => 'Short Description',
            'full_desc' => 'Full Description',
            'cat_img' => 'Category Image',
            'text' => 'Category Text',
            'link' => 'Link to other category',
            'cat_icon' => 'Category icon',
            'alias' => 'Category alias',
            'visible' => 'Is visible ?'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['cat_id' => 'id']);
    }

    public function getProductsAsc()
    {
        return $this->hasMany(Product::className(), ['cat_id' => 'id'])->orderBy(['name' => SORT_ASC ] );
    }


    public function beforeSave($insert)
    {
        if(!$this->alias){
                $nae_arr = explode(" ", $this->name);
            $alias = '';
            for($i=0;$i<=count($nae_arr)-1;$i++){
                if($i == count($nae_arr)-1){
                $alias.=  strtolower($nae_arr[$i]);
                }else{
                    $alias.=  strtolower($nae_arr[$i]).'_';
                }
            }
            $this->alias = $alias;
        }
        return parent::beforeSave($insert);

    }

}
