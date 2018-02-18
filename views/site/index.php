<?php

use yii\widgets\LinkPager;

?>

<div class="container">
    <?php foreach ($articles as $data): ?>
    <div class="row article-main">
        <div class="row article-image">
            <img src="<?=$data->getImage()?>" alt="" >
        </div>
        <div class="row article-title">
            <p><strong>Заголовок:</strong></p>
            <p><?=$data['title']?></p>
        </div>
        <div class="row category-title">
            <p><strong>Категория:</strong></p>
            <p><a href="" class="btn btn-default"><?=$data->category->title;?></a></p>
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
            <div class="col-md-6">Дата: <?=$data['date']?></div>
            <div class="col-md-6"><img src="/eye.png" alt="" width="25" height="25">
                Просмотры:<?=(int)$data['viewed']?></div>
        </div>
    </div>
    <?php endforeach; ?>





    <?php
    echo LinkPager::widget([
        'pagination' => $pagination,
    ]); ?>
</div>