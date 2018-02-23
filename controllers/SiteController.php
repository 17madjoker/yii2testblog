<?php

namespace app\controllers;

use app\models\Category;
use app\models\CommentForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Article;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//        $model = new Article();
//        $data = $model->getAll();
        $data = Article::getAll(2);
        $articles = $data['articles'];
        $pagination = $data['pagination'];
        $popular = Article::getPopular();
        $last = Article::getLast();
        $category = Category::getAllCategories();
        return $this->render('index',[
            'articles' => $articles,
            'pagination' => $pagination,
            'popular' => $popular,
            'last' => $last,
            'category' => $category,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionView($id)
    {
        $article = Article::findOne($id);
        $popular = Article::getPopular();
        $last = Article::getLast();
        $category = Category::getAllCategories();
        $comments = $article->getAppliedComments();
        $commentForm = new CommentForm();
        $article->viewCounter();
        return $this->render('single',[
            'article'=>$article,
            'popular' => $popular,
            'last' => $last,
            'category' => $category,
            'comments' => $comments,
            'commentForm' => $commentForm,
        ]);
    }

    public function actionCategory($id)
    {
        $data = Category::getArticlesOneCategory(1,$id);
        $articles = $data['articles'];
        $pagination = $data['pagination'];
        $popular = Article::getPopular();
        $last = Article::getLast();
        $category = Category::getAllCategories();
        return $this->render('category',[
            'articles' => $articles,
            'pagination' => $pagination,
            'popular' => $popular,
            'last' => $last,
            'category' => $category,
        ]);
    }

    public function actionComment($id)
    {
        $model = new CommentForm();
        if (Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('success','Спасибо за комментарий! Он скоро будет добавлен!)');
                return $this->redirect(['site/view','id'=>$id]);
            }
        }
    }
}
