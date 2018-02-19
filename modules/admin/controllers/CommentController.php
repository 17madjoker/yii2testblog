<?php
namespace app\modules\admin\controllers;
use app\models\Comment;
use yii\web\Controller;

class CommentController extends Controller
{
    public function actionIndex()
    {
        $comments = Comment::find()->orderBy('id DESC')->all();
        return $this->render('comment',['comments'=>$comments]);
    }

    public function actionDelete($id)
    {
        $comment = Comment::findOne($id);
        if($comment->delete())
        {
            return $this->redirect(['comment/index']);
        }
    }

    public function actionAllow($id)
    {
        $comment = Comment::findOne($id);
        if ($comment->allow())
        {
            return $this->redirect(['comment/index']);
        }
    }

    public function actionDisable($id)
    {
        $comment = Comment::findOne($id);
        if ($comment->disable())
        {
            return $this->redirect(['comment/index']);
        }
    }

}