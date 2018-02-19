<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
                <div class="row article-main">
                    <div class="row article-image">
                        <img src="<?=$article->getImage();?>" alt="" >
                    </div>
                    <div class="row article-title">
                        <h4><strong><?=$article['title']?></strong></h4>
                    </div>
                    <div class="row category-title">
                        <p><strong>Категория:</strong></p>
                        <p><a href="<?=Url::toRoute(['site/category','id'=>$article->category->id])?>">
                                <?=$article->category->title;?></a></p>
                    </div>
                    <div class="row article-description">
                        <p><strong>Описание:</strong></p>
                        <p><?=$article['description']?></p>
                    </div>
                    <div class="row article-content">
                        <p class="text-justify"><p><strong>Текст:</strong></p>
                        <p><?=$article['content']?></p></p>
                    </div>
                    <div class="row article-info">
                        <div class="col-md-6"><strong>Дата:</strong> <?=$article['date']?></div>
                        <div class="col-md-6"><img src="/eye.png" alt="" width="25" height="25">
                            <strong> Просмотры: </strong><?=(int)$article['viewed']?></div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                <?php if(!empty($comments)): ?>
                    <?php foreach($comments as $data): ?>
                    <div class="row" style="
                    margin-top:15px;
                    margin-bottom: 15px;
                    padding: 15px;
                    border: 1px solid #EEEEEE">
                        <div class="col-md-4">
                            <div class="row">
                                <img src="<?= $data->user->image; ?>" alt="" width="100" height="100">
                            </div>
                            <div class="row" style="margin-top: 20px"><strong>Дата:</strong>
                                <?= $data->date ?></div>
                        </div>
                        <div class="col-md-8">
                            <strong><p class="text-center"><?= $data->user->name; ?></p></strong>
                            <p><?= $data->text ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>

                <?php if(!Yii::$app->user->isGuest): ?>
                <div class="row" style="margin-bottom: 20px;">
                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'action'=>['site/comment','id'=>$article->id],
                        'options' => ['class'=>'contact-form','role'=>'form']
                    ]) ?>
                    <?= $form->field($commentForm,'comment')->
                    textarea(['class'=>'form-control'])?>
                    <button type="submit" class="btn">Отправить</button>
                    <?php \yii\widgets\ActiveForm::end() ?>
                    <?php if( Yii::$app->session->hasFlash('success') ): ?>
                        <hr>
                        <div class="row alert alert-success alert-dismissible" role="alert">
                            <?php echo Yii::$app->session->getFlash('success'); ?>
                        </div>
                    <?php endif;?>
                </div>
                <?php endif; ?>

        </div>
        <div class="col-lg-4">
            <div class="row">
                <h4 class="text-center">POPULAR POSTS</h4>
                <div class="row article-popular">
                    <?php foreach($popular as $populardata): ?>
                        <div class="row">
                            <img src="<?=$populardata->getImage()?>" alt="" height="100" width="100">
                        </div>
                        <div class="row">
                            <a href="<?=Url::toRoute(['site/view','id'=>$populardata->id])?>"><?=$populardata['title']?></a>
                        </div>
                        <div class="row">
                            <span><?=$populardata['date']?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row">
                <h4 class="text-center">RECENT POSTS</h4>
                <div class="row article-recent">
                    <?php foreach($last as $recentdata): ?>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?=$recentdata->getImage()?>" alt="" height="50" width="50">
                            </div>
                            <div class="col-md-8">
                                <p><a href="<?=Url::toRoute(['site/view','id'=>$recentdata->id])?>">
                                        <?=$recentdata['title']?></a></p>
                                <span><?=$recentdata['date']?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row">
                <h4 class="text-center">CATEGORIES</h4>
                <div class="row">
                    <?php foreach($category as $allcategory): ?>
                        <div class="row article-categories">
                            <div class="col-md-8"><a href="<?=Url::toRoute(['site/category','id'=>$allcategory->id])?>">
                                    <?=$allcategory['title']?></a></div>
                            <div class="col-md-4"><?=$allcategory->getArticleCount()?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</div>