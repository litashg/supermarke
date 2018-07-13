<?php
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\ReportHistory;

use app\components\adminCollapsibleBlock;
?>


<?php $this->title = Yii::t('admin', 'Site dashboard');?>
<h1>Reports History</h1>


	<? Pjax::begin();?>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,

		tableOptions => ['class' => 'table table-bordered'],
		'rowOptions' => function ($model, $index, $widget, $grid){
		return ['style'=> 'background-color:'.
			\app\models\Status::find()
			->where(['id'=>$model->status_id])
			->one()
			->color
			.';'];
		},

		'columns' => [

			'report_id',

			[
				'attribute'=>'status_id',
				'value'=>'statusInfo.title'
			],
			'status_comment',
			'send_datetime',



			[
				'attribute'=>'username',

				'value' => function ($model) {
		$user = \dektrium\user\models\User::findOne(['id' => \app\models\Report::findOne(['id'=>$model->report_id])->user_id]);

		return $user->username;
	}
			],
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{today_action}',

				'buttons' => [
					'today_action' => function ($url, $model) {
						return Html::a('<span style=" cursor:pointer;font-size: 25px;"     class="fa fa-eye "></span>', $url,
							[
								'title' => Yii::t('app', 'View report details'),
							]);
					}
				],
				'urlCreator' => function ($action, $model, $key, $index) {
					if ($action === 'today_action') {
						$url ='/report/view?id='.$model->report_id;
						return $url;
					}
				}
			],


			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{today_action}',
				'buttons' => [
					'today_action' => function ($url, $model) {
						return Html::a('<span style=" cursor:pointer;font-size: 25px;" data-target="#myModalyes" data-current-id="'.$model->id.'" data-id="'.$model->report_id.'" data-toggle="modal" id="modalyes" class="fa fa-check-square-o "></span>', $url,
							[
								'title' => Yii::t('app', 'Confirm report'),
							]);
					}
				],
				'urlCreator' => function ($action, $model, $key, $index) {
					if ($action === 'today_action') {

					}
				}
			],
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{today_action}',
				'buttons' => [
					'today_action' => function ($url, $model) {
						return Html::a('<span style=" cursor:pointer;font-size: 23px;" data-target="#myModalno" data-current-id="'.$model->id.'" data-id="'.$model->report_id.'" data-toggle="modal" id="modalno" class="fa fa-ban "></span>', $url,
							[
								'title' => Yii::t('app', 'Confirm report'),
							]);
					}
				],
				'urlCreator' => function ($action, $model, $key, $index) {
					if ($action === 'today_action') {

					}
				}
			],




		],
	]); ?>
<? Pjax::end(); ?>


<div class="container">



	<div class="modal fade" id="myModalyes" role="dialog">
		<div class="modal-dialog">


			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Comment</h4>
				</div>
				<div class="modal-body">
					<textarea style="width: 100%" class="field span12" id="textarea_yes" rows="6" placeholder="Enter your comment"></textarea>
				</div>
				<div class="modal-footer">

					<a type="button" id ='modelyes_save' class="btn btn-default">Save</a>
					<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>

				</div>
			</div>

		</div>
	</div>

	<div class="modal fade" id="myModalno" role="dialog">
		<div class="modal-dialog">


			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Comment</h4>
				</div>
				<div class="modal-body">
					<textarea style="width: 100%" class="field span12" id="textarea_no" rows="6" placeholder="Enter your comment"></textarea>
				</div>
				<div class="modal-footer">

					<a type="button" id ='modelno_save' class="btn btn-default">Save</a>


					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

				</div>
			</div>

		</div>
	</div>

</div>

<script>

</script>


 <? $this->registerJsFile('/js/view.js'); ?>