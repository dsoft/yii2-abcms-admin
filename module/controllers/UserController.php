<?php

namespace abcms\admin\module\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use abcms\admin\models\LoginForm;

/**
 * Default controller for the `admin` module
 */
class UserController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public $defaultAction = 'login';
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'update'],
                'rules' => [
                    [
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
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Update profile action.
     *
     * @return Response|string
     */
    public function actionUpdate()
    {
        $model = Yii::$app->user->identity;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->password){
                $model->setPassword($model->password);
            }
            if($model->save(false)){
                Yii::$app->session->setFlash('success', 'Profile updated.');
                return $this->refresh();
            }
        }
        return $this->render('update', [
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
}
