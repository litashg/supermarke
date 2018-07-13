<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\Category;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
<!--    --><?//= $form->field($model, 'alias')->textInput(['maxlength' => 255]) ?>

    <?=$form->field($model, 'visible')->checkBox([
        'uncheck' => '0', 'checked' => '1'])
    ?>



    <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name')
    ) ?>
    <!--    TREE-->
    <div id="jstree_demo_div">
        <ul>
            <li id="0">No parent

                <?
                $datas = Category::find()->all();
                function generatePageTree($datas, $parent = 0, $limit=0){
                    if($limit > 1000) return ''; // Make sure not to have an endless recursion
                    $tree = '<ul>';
                    for($i=0, $ni=count($datas); $i < $ni; $i++){
                        if($datas[$i]->parent_id == $parent){
                            $tree .= '<li id="'.$datas[$i]->id.'">';
                            $tree .= $datas[$i]->name;
                            $tree .= generatePageTree($datas, $datas[$i]->id, $limit++);
                            $tree .= '</li>';
                        }
                    }
                    $tree .= '</ul>';
                    return $tree;
                }
                echo(generatePageTree($datas));
                ?>
            </li>
        </ul>
    </div>

    <!--    TREE-->

    <?= $form->field($model, 'short_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'full_desc')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'link')->textInput(['maxlength' => 255]) ?>
	<?= $form->field($model, 'text')->widget(CKEditor::className(), [
		'options' => ['rows' => 6],
		'preset' => 'full'
	]) ?>

    <!--
    <?= $form->field($model, 'cat_img')->textInput(['maxlength' => 255]) ?>


    -->
    <?php if(!$model->isNewRecord){
        echo  '<div class="img_cont">';
        echo  '<img alt="#" class="main_img" width="100" height="100" src="';
        echo Yii::$app->request->BaseUrl.'/uploads/'.$model->cat_img;
        echo '"></div>';
    }

    ?>

    <?
    // your fileinput widget for single file upload
    echo $form->field($model, 'image')->widget(FileInput::classname(), [
        'options'=>[
            'accept'=>'image/*',
        ],

        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'], 'showUpload'=> false, ]]);
    ?>
    </br>  </br>
    <?php if(!$model->isNewRecord){
        echo  '<div class="img_cont">';
        echo  '<img alt="#" class="main_img" width="100" height="100" src="';
        echo Yii::$app->request->BaseUrl.'/uploads/cat_icon/'.$model->cat_icon;
        echo '"></div>';
    }

    ?>
    <?
    // your fileinput widget for single file upload
    echo $form->field($model, 'icon')->widget(FileInput::classname(), [
        'options'=>[
            'accept'=>'image/*',
        ],

        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'], 'showUpload'=> false, ]]);
    ?>

    </br>  </br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>








</div>

<?php if($model->isNewRecord || $model->parent_id==0):?>
<script>
    $("#category-parent_id").prepend("<option value='0' selected='selected'>No parent</option>");
</script>
<?php else:?>

<script>
    $("#category-parent_id").prepend("<option value='0' >No parent</option>");
</script>
<?php endif; ?>


