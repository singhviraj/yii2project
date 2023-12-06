<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Users;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
        return $this->render('index');
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
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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
// i got error when I wrote small h in actionhello

/*
    public function actionHello(){
        return $this->render('hello');
    }

    public function actionForm(){
        $model = new Users;

$model->load(\Yii::$app->request->post());

if ($model->validate()) {
    Yii::$app->session->setFlash('success','submitted successfully');
      
    if (($model = Users::find()->select('email, password')
   ->where(['email' => 'testmail2698@gmail.com', 'password' => 'Viraj'])
->one()) !== null)
{


    if($model->save()){
        return $this->render('index');

    }
              
    }
  
}
        return $this->render('form',['model'=>$model]);
        
    }

    public function actionPrint(){
        $users = Users::find()->all();
        return $this->render('showrecords',['users'=>$users]); 
    }
    public function actionSign(){
        $model = new Users;

$model->load(\Yii::$app->request->post());

if ($model->validate()) {
    Yii::$app->session->setFlash('success','submitted successfully');
      
   if (($model = Users::find()->select('email, password')
    ->where(['email' => 'testmail2698@gmail.com', 'password' => 'Viraj'])
->one()) !== null)
 {
    
              
    }
  
}
        return $this->render('sign',['model'=>$model]);
        
    }
   */
}
