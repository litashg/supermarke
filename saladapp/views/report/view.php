<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="report-view">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <h3>Report '<?php echo $type->name;?>' by user - <?php echo $user->username;?></h3>



<!--        --><?//= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>




    <table class="table table-striped table-bordered">
        <caption>
            <h2>
                <?php  echo $model->id ?> - Report detail info
            </h2>
        </caption>

        <thead>
        <tr>

        </tr>
        <?php $reportStoreOptions = \app\models\ReportTypeOption::find()->where('report_type_id='.$model->type_id)->all();

        foreach($reportStoreOptions as $option){

            $reportOptionsType = \app\models\ReportOptionType::find()->where('id='.$option->report_option_type_id)->one();

            $reportValue = \app\models\ReportOptionsValue::find()->where('report_type_option_id='.$option->id)->andWhere('report_id='.$model->id)->one();

            switch($reportOptionsType->type){
                case 'text_line' :
                    echo "<tr><td >".$option->title;
                    echo "</td>";
                    echo "<td>";
                    echo "<input readonly type='text' value='".$reportValue->value."'>";
                    echo "</td></tr>";
                    break;
                case 'text_area':
                    echo "<tr><td >".$option->title;
                    echo "</td>";
                    echo "<td>";
                    echo "<textarea rows='4' disabled cols='50'>".$reportValue->value."</textarea>";
                    echo "</td></tr>";
                    break;
                case 'checkbox':
                    echo "<tr><td>".$option->title;
                    echo "</td>";
                    echo "<td>";
                    if($reportValue->value==1){
                        echo "<input type='checkbox' name='".$option->title."' checked disabled  value='".$reportValue->value."'>";
                    }else{
                        echo "<input type='checkbox' name='".$option->title."'   disabled value='".$reportValue->value."'>";
                    }
                    echo "</td></tr>";
                    break;
                case 'time_field':
                    echo "<tr><td >".$option->title;
                    echo "</td>";
                    echo "<td>";
                    echo "<input readonly type='text' value='".$reportValue->value."'>";
                    echo "</td></tr>";
                    break;
                case 'title1':
                    echo "<tr><td colspan='2'><h3>".$option->title;
                    echo "</h3></td>";
                    echo "</tr>";
                    break;
                case 'number_picker':
                    echo "<tr><td>".$option->title;
                    echo "</td>";
                    echo "<td>";
                    echo "<br>";
                    echo "<input readonly type='text' value='".$reportValue->value."'>";
                    echo "</td></tr>";
                    break;
                case 'title2':
                    echo "<tr><td colspan='2'><h3><b>".$option->title;
                    echo "</b></h3></td>";
                    echo "</tr>";
                    break;
                case 'line_devider':
                    echo "<tr >";
                    echo "<td style='border-left: 1px solid white;border-right:1px solid white ; ' colspan='2'>";
                    echo "<hr style='border-top: 5px solid grey;'/>";
                    echo "</td></tr>";
                    break;
                case 'line_devider2':
                    echo "<tr>";
                    echo "<td  style='border-left: 1px solid white;border-right:1px solid white ; ' colspan='2'>";
                    echo "<hr style='border-top: 5px solid grey;'/>";
                    echo "</td></tr>";
                    break;
                case 'line_devider3':
                    echo "<tr>";
                    echo "<td  style='border-left: 1px solid white;border-right:1px solid white ; ' colspan='2'>";
                    echo "<hr style='border-top: 5px solid grey;'/>";
                    echo "</td></tr>";
                    break;
                default:
                    echo "<tr><td>".$option->title;
                    echo "</td>";
                    echo "<td>";
                    echo "<div>".$reportValue->value."</div>";
                    echo "</td></tr>";
                    break;
            }
        }
?>
        </thead>

    </table>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label'=>'Report type',
                'attribute'=>'typeInfo.name'
            ],
            [
                'label'=>'Report former',
                'attribute'=> 'userInfo.username',
            ],
            [
                'label'=>'Store name',
                'attribute'=> 'storeInfo.name',
            ],

            'comment:ntext',
            [
                'label'=>'Status',
                'attribute'=>   'statusInfo.title',
            ],


            'creation_date',
            'transaction',
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $store,
        'attributes' => [
//            'id',
            [
                'label'=>'Store name',
                'attribute'=>   'name',
            ],
            [
                'label'=>'Store description',
                'attribute'=>     'description',
            ],
            [
                'label'=>'Store phone',
                'attribute'=>        'phone',
            ],
            [
                'label'=>'Store email',
                'attribute'=>       'email',
            ],
            [
                'label'=>'Store address',
                'attribute'=>    'address'
            ],

        ],
    ]) ?>
<!--    <h4><a href="mailto:--><?php //echo $user->email;?><!--">Contact with author</a></h4>-->
</div>
