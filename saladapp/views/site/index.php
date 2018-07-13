<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dektrium\user\widgets\Connect;
/* @var $this yii\web\View */
$this->title = 'Salad reports';
?>

<div class="container">
<div class="jumbotron vert-offset-top-6 vert-offset-bottom-6" >
    <h1>
        A reports control app for our teams.
    </h1>

    All your reports in one place, integrating with the tools and services you use every day.
</div>

<?   if(Yii::$app->user->isGuest){?>
<div style="width:100%;text-align: center">
    Sign in and system will automatically redirects you
</div>
<? echo Html::a('Lets start', ['/user/login'], ['class'=>'vert-offset-top-1 btn  btn-block btn-site']);
    ?>
<? }else{
    if(Yii::$app->user->identity->role==1 || Yii::$app->user->identity->role==4) {
        echo Html::a('Cabinet', ['/admin'], ['class' => 'vert-offset-top-1 btn  btn-block btn-primary']);
    }elseif(Yii::$app->user->identity->role==2 || Yii::$app->user->identity->role==3) {
        echo Html::a('Cabinet', ['/cabinet'], ['class' => 'vert-offset-top-1 btn  btn-block btn-primary']);
    }elseif(Yii::$app->user->identity->role==5){
        echo Html::a('Cabinet', ['/guest'], ['class' => 'vert-offset-top-1 btn  btn-block btn-primary']);
    }
} ?>

</div>


<style>
    html, body {
        height: 100%;
    }
    a{
        color: rgba(255, 255, 255, 0.8);
    }
    a:hover{
        color: white;
    }
</style>