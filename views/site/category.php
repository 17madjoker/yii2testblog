<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h4 class="text-center">ARTICLES</h4>
            <?php if(empty($articles)): ?>
            <div class="row">
                <h3 class="text-center">В данной категории нет статей.</h3>
            </div>
            <?php endif; ?>
            <?php foreach ($articles as $data): ?>
                <div class="row article-main">
                    <div class="row article-image">
                        <a href="<?=Url::toRoute(['site/view','id'=>$data->id])?>">
                            <img src="<?=$data->getImage()?>" alt="" ></a>
                    </div>
                    <div class="row article-title">
                        <p><strong>Заголовок:</strong></p>
                        <p><a href="<?=Url::toRoute(['site/view','id'=>$data->id])?>">
                                <?=$data['title']?></a></p>
                    </div>
                    <div class="row category-title">
                        <p><strong>Категория:</strong></p>
                        <p><a href="<?=Url::toRoute(['site/category','id'=>$data->category->id])?>">
                                <?=$data->category->title;?></a></p>
                    </div>
                    <div class="row article-description">
                        <p><strong>Описание:</strong></p>
                        <p><?=$data['description']?></p>
                    </div>
                    <div class="row article-content">
                        <p class="text-justify"><p><strong>Текст:</strong></p>
                        <p><?=$data['content']?></p></p>
                    </div>
                    <div class="row article-info">
                        <div class="col-md-6"><strong>Дата:</strong> <?=$data['date']?></div>
                        <div class="col-md-6"><img src="/eye.png" alt="" width="25" height="25">
                            <strong> Просмотры: </strong><?=(int)$data['viewed']?></div>
                        <hr>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php
            echo LinkPager::widget([
                'pagination' => $pagination,
            ]); ?>
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