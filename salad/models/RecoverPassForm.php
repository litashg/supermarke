<?php

namespace app\models;

use yii\base\Model;
use Yii;


class RecoverPassForm extends Model
{

    public $new_pass;


    public function rules()
    {
        return [
            [['new_pass'], 'required'],


        ];
    }

    public function attributeLabels()
    {
        return [
            'new_pass' => 'New password',
        ];
    }

}