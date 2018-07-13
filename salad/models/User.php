<?php

namespace app\models;

use Yii;
use yii\rbac\DbManager;
use \app\models\AuthAssignment;
use yii\base\Security;


/**
 * This is the model class for table "t_user".
 *
 * @property integer $id
 * @property string $name
 * @property string $password
 * @property string $role
 * * @property string password_hash
 * * @property string $image
 * * @property string $email
 * * @property string $forgot_key

 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	public $filename;
    public $password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'password', 'role'], 'required'],
            [['name', 'email'],'unique'],
            [['name', 'role'], 'required', 'on' => 'update'],
            [['name', 'password', 'role','password_hash'], 'string', 'max' => 255],
	        [['image','forgot_key'], 'safe'],
	        [['image'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }
    public function scenarios()
	    {
	        $scenarios = parent::scenarios();
	        $scenarios['update'] = ['name','role','email'];

	        $scenarios['forgot_key'] = ['forgot_key'];
	        $scenarios['new_pass'] = ['password_hash','forgot_key'];

	        return $scenarios;
	    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'password' => 'Password',
            'role' => 'Role',
	        'image'=>'Logo',
            'email'=>'Email',
            'forgot_key'=>'Forgot key'

        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);


    }
    public static function findByUsername($username)
    {

        $users = self::find()->all();
        foreach ($users as $user) {
            if (strcasecmp($user['name'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }
    public function validatePassword($password)
    {
    //return true;
        //return $this->password === $password;
        return Yii::$app->security->validatePassword($password, $this->password_hash);

    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $users = self::find()->all();
        foreach ($users as $user) {
            //if ($user['accessToken'] === $token)
            {
                return new static($user);
            }
        }

        return null;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        return true;
            //$this->authKey;
    }

    public function getPasswordHash()
    {
        return $this->password_hash;
    }


    public function validateAuthKey($authKey)
    {
        return true;
            //$this->authKey === $authKey;
    }
//    BEFORE SAVE

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function beforeSave($insert)
    {



        AuthAssignment::deleteAll('user_id = :id', [':id' => $this->id]);
        return parent::beforeSave($insert);
    }
    public function afterSave($insert,$changedAttributes)
    {


              $r = new DbManager;
             $r->init();
           $role = $r->getRole($this->role);
            $r->assign($role, $this->id);

      //  }

        return parent::afterSave($insert,$changedAttributes);
    }



}
