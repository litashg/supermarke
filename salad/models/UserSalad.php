<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "t_user_salad".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property string $ingred
 * @property string $email
 * @property string $user_name
 * @property string $created
 * @property string $uniq_id
 * @property integer $user_id
 */
class UserSalad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_user_salad';
    }
public $allergens = [];
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['update'] = [''];
        return $scenarios;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img', 'ingred', 'email', 'user_name', 'created', 'user_id','uniq_id'], 'safe'],
           // [['created'], 'safe'],
            [['user_id'], 'integer'],
            [['name', 'ingred', 'email', 'user_name'], 'string', 'max' => 255]
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
            'img' => 'Img',
            'ingred' => 'Ingred',
            'email' => 'Email',
            'user_name' => 'User Name',
            'created' => 'Created',
            'user_id' => 'User ID',
            'uniq_id'=>'Uniq ID'
        ];
    }
    public function beforeSave($insert)

    {
        $this->created = new Expression('NOW()');
        return parent::beforeSave($insert);

    }
    public function getRname()
    {

            return $this->hasOne(User::className(), ['id' => 'user_id']);

    }

//    public function getAllergens()
//    {
//
//        $this->allergens = \app\models\Allergens::find()->select('name')->asArray()->all();
//        var_dump($this->allergens);
//        //die;
//      return $this->allergens;
//    }

}
