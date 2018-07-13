<?php
namespace app\modules\api\controllers;


use yii\data\ActiveDataProvider;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Response;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: PUT,GET,HEAD,POST,PATCH,DELETE,OPTIONS');


class RoleController extends ActiveController
{

    public $modelClass = 'app\models\Role';





}