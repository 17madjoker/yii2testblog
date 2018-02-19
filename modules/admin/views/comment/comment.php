<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(!empty($comments)): ?>
    <table class="table table-striped table-bordered table-hover ">
        <thead>
        <tr>
            <td><strong>Text</strong></td>
            <td><strong>Status</strong></td>
            <td><strong>Delete</strong></td>
            <td><strong>Allow</strong></td>
            <td><strong>Disable</strong></td>
        </tr>
        </thead>
        <?php foreach($comments as $comment): ?>
            <tr>
                <td><?=$comment->text?></td>
                <td><?=$comment->status?></td>
                <td><a class="btn btn-danger" href="
                <?= Url::toRoute(['comment/delete','id'=>$comment->id]) ?>">Delete</a></td>
                <td><a class="btn btn-success" href="
                <?= Url::toRoute(['comment/allow','id'=>$comment->id]) ?>">Allow</a></td>
                <td><a class="btn btn-info" href="
                <?= Url::toRoute(['comment/disable','id'=>$comment->id]) ?>">Disable</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php endif ?>

</div>

