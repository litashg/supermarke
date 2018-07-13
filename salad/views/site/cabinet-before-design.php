<?php

use yii\helpers\Url;
use app\models\User;

?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="push-down-30">
                <div class="banners--big my_banner">
                    <strong> CUSTOMER CABINET</strong>
                </div>
            </div>
        </div>
    </div>

<div class="container con_my">
		<div class="row">
			<div class='col-xs-6 col-sm-2 col-md-3'>
<!--USER-->
				<div class="products__single">
					<?php

                    $cur_customer = User::find()->where('id = :userid', [':userid' => Yii::$app->user->identity->id])->one();

                    if( $cur_customer->image){
                        $img_m_path = $cur_customer->image;
                    }else{
                        $img_m_path= 'user.png';
                    }

					?>
					<figure class="products__image my_img">
						<a href="">
							<img alt="#" class="products__image my_img" width="200" height="200" src="<?php
							echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>">
						</a>
					</figure>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h5 class="products__title text-center">
								<a class="products__link  js--isotope-title" href="<?= Url::toRoute( [
									'/site/view_cat',
									//'id' => $model->id
								] ) ?>">HELLO, <?= $cur_customer->name;?>!</a>

							</h5>
						</div>

					</div>

				</div>
<!--		USER		-->
			</div>


			<div class='col-xs-6 col-sm-10 col-md-9'>
			<div class='col-xs-6 col-sm-6 col-md-3 js--isotope-target js--cat-1'>
				<div class="products__single">
					<?php
					$img_m_path = 'Salad-icon.png'
					?>
					<figure class="products__image my_img">
						<a href="">
							<img alt="#" class="products__image my_img" width="200" height="200" src="<?php
							echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>">
						</a>

						<div class="product-overlay">
							<!--                            <a class="product-overlay__more" href="-->
							<? //=Url::toRoute(['/site/view_cat','id'=>$model->id])?><!--">-->
							<!--                                <span class="glyphicon glyphicon-search"></span>-->
							<!--                            </a>-->
							<a class="link_img" href="">
								<img alt="#" class="img_span" width="263" height="334" src="<?php
								echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>"></a>
						</div>
					</figure>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h5 class="products__title">
								<a class="products__link  js--isotope-title" href="<?= Url::toRoute( [
										'/site/view_cat',
										//'id' => $model->id
									] ) ?>"><? ?></a>
							</h5>
						</div>

					</div>
					<div class="products__category">
						my staff
					</div>
				</div>
			</div>
			<div class='col-xs-6 col-sm-6 col-md-3 js--isotope-target js--cat-1'>
				<div class="products__single">
					<?php
					$img_m_path = 'Salad-icon.png'
					?>
					<figure class="products__image my_img">
						<a href="">
							<img alt="#" class="products__image my_img" width="200" height="200" src="<?php
							echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>">
						</a>

						<div class="product-overlay">
							<!--                            <a class="product-overlay__more" href="-->
							<? //=Url::toRoute(['/site/view_cat','id'=>$model->id])?><!--">-->
							<!--                                <span class="glyphicon glyphicon-search"></span>-->
							<!--                            </a>-->
							<a class="link_img" href="">
								<img alt="#" class="img_span" width="263" height="334" src="<?php
								echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>"></a>
						</div>
					</figure>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h5 class="products__title">
								<a class="products__link  js--isotope-title" href="<?= Url::toRoute( [
									'/site/view_cat',

								] ) ?>"><??></a>
							</h5>
						</div>

					</div>
					<div class="products__category">
						Blank Forms (PDF)
					</div>
				</div>
			</div>
			<div class='col-xs-6 col-sm-6 col-md-3 js--isotope-target js--cat-1'>
				<div class="products__single">
					<?php
					$img_m_path = 'Salad-icon.png'
					?>
					<figure class="products__image my_img">
						<a href="">
							<img alt="#" class="products__image my_img" width="200" height="200" src="<?php
							echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>">
						</a>

						<div class="product-overlay">
							<!--                            <a class="product-overlay__more" href="-->
							<? //=Url::toRoute(['/site/view_cat','id'=>$model->id])?><!--">-->
							<!--                                <span class="glyphicon glyphicon-search"></span>-->
							<!--                            </a>-->
							<a class="link_img" href="">
								<img alt="#" class="img_span" width="263" height="334" src="<?php
								echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>"></a>
						</div>
					</figure>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h5 class="products__title">
								<a class="products__link  js--isotope-title" href="<?= Url::toRoute( [
									'/site/view_cat',
									//'id' => $model->id
								] ) ?>"><? ?></a>
							</h5>
						</div>

					</div>
					<div class="products__category">
						Recepies
					</div>
				</div>
			</div>
			<div class='col-xs-6 col-sm-6 col-md-3 js--isotope-target js--cat-1'>
				<div class="products__single">
					<?php
					$img_m_path = 'Salad-icon.png'
					?>
					<figure class="products__image my_img">
						<a href="">
							<img alt="#" class="products__image my_img" width="200" height="200" src="<?php
							echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>">
						</a>

						<div class="product-overlay">
							<!--                            <a class="product-overlay__more" href="-->
							<? //=Url::toRoute(['/site/view_cat','id'=>$model->id])?><!--">-->
							<!--                                <span class="glyphicon glyphicon-search"></span>-->
							<!--                            </a>-->
							<a class="link_img" href="">
								<img alt="#" class="img_span" width="263" height="334" src="<?php
								echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>"></a>
						</div>
					</figure>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h5 class="products__title">
								<a class="products__link  js--isotope-title" href="<?= Url::toRoute( [
									'/site/view_cat',
								//	'id' => $model->id
								] ) ?>"><??></a>
							</h5>
						</div>

					</div>
					<div class="products__category">
						POS Sings
					</div>
				</div>
			</div>
			<div class='col-xs-6 col-sm-6 col-md-3 js--isotope-target js--cat-1'>
				<div class="products__single">
					<?php
					$img_m_path = 'Salad-icon.png'
					?>
					<figure class="products__image my_img">
						<a href="">
							<img alt="#" class="products__image my_img" width="200" height="200" src="<?php
							echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>">
						</a>

						<div class="product-overlay">
							<!--                            <a class="product-overlay__more" href="-->
							<? //=Url::toRoute(['/site/view_cat','id'=>$model->id])?><!--">-->
							<!--                                <span class="glyphicon glyphicon-search"></span>-->
							<!--                            </a>-->
							<a class="link_img" href="">
								<img alt="#" class="img_span" width="263" height="334" src="<?php
								echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>"></a>
						</div>
					</figure>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h5 class="products__title">
								<a class="products__link  js--isotope-title" href="<?= Url::toRoute( [
									'/site/view_cat',
									//'id' => $model->id
								] ) ?>"><? ?></a>
							</h5>
						</div>

					</div>
					<div class="products__category">
						Virtual Tour
					</div>
				</div>
			</div>
			<div class='col-xs-6 col-sm-6 col-md-3 js--isotope-target js--cat-1'>
				<div class="products__single">
					<?php
					$img_m_path = 'Salad-icon.png'
					?>
					<figure class="products__image my_img">
						<a href="">
							<img alt="#" class="products__image my_img" width="200" height="200" src="<?php
							echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>">
						</a>

						<div class="product-overlay">
							<!--                            <a class="product-overlay__more" href="-->
							<? //=Url::toRoute(['/site/view_cat','id'=>$model->id])?><!--">-->
							<!--                                <span class="glyphicon glyphicon-search"></span>-->
							<!--                            </a>-->
							<a class="link_img" href="">
								<img alt="#" class="img_span" width="263" height="334" src="<?php
								echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>"></a>
						</div>
					</figure>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 ">
							<h5 class="products__title ">
								<a class=" products__link  js--isotope-title" href="<?= Url::toRoute( [
									'/site/view_cat',
									//'id' => $model->id
								] ) ?>"><? ?></a>
							</h5>
						</div>

					</div>
					<div class="products__category">
						Training Videos
					</div>
				</div>
			</div>

			</div>

		</div>

</div>
</div>