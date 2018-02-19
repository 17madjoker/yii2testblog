<?php
/**
 * Created by PhpStorm.
 * User: Kirilloid
 * Date: 19.02.2018
 * Time: 15:15
 */
namespace app\controllers;
use app\models\SingupForm;
use yii\web\Controller;
use Yii;
use app\models\User;
use app\models\LoginForm;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionSingup()
    {
        $model = new SingupForm();
        if (Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if ($model->singup())
            {
                return $this->redirect(['auth/login']);
            }
        }
        return $this->render('singup',[
            'model'=>$model
        ]);
    }

    public function actionTest()
    {
        $user = User::findOne(1);
        Yii::$app->user->login($user);
        Yii::$app->user->logout();
        var_dump(Yii::$app->user->isGuest);
    }
}