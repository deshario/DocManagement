<?php
namespace app\controllers;

use app\components\AccessRule;
use app\models\Managers;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\ContactForm;
/**
 * Site controller
 */
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
                'ruleConfig' => [
                    'class' => AccessRule::className()
                ],
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'], // only allowed for guest
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'], // only allowed for logged in users
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
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect(['/site/routing']);
    }

    public function actionRouting(){
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/login']);
        }else{
            $MRoles = Yii::$app->user->identity->roles;
            if($MRoles == User::ROLE_USER){
                return $this->redirect(['/project/mine']);
            }elseif ($MRoles == User::ROLE_ADMIN){
                return $this->redirect(['/project/index']);
            }
        }
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $MRoles = Yii::$app->user->identity->roles;
                if($MRoles == User::ROLE_USER){
                    return $this->redirect(['/project/mine']);
                }elseif ($MRoles == User::ROLE_ADMIN){
                    return $this->redirect(['/project/index']);
                }
        } else {
            $model->password = '';
            $this->layout = "main-login";
            return $this->render('theme_login', [
                'model' => $model,
            ]);
        }
    }

    public function actionHome(){
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }else {
//            $MRoles = Yii::$app->user->identity->roles;
//            if ($MRoles == Managers::ROLE_MANAGER) {
//                return $this->redirect(['/blood-requests']);
//            } elseif ($MRoles == Managers::ROLE_ADMIN) {
//                return $this->redirect(['/managers']);
//            }
            return $this->redirect('index');
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    //return $this->goHome();
                    return $this->redirect('home');
                }
                echo 'hello world';
            }
        }
        $this->layout = "main-signup";
        return $this->render('theme_signup', [
            'model' => $model,
        ]);
    }

    public function actionFault()
    {
        $exception = Yii::$app->errorHandler->exception;

        if ($exception !== null) {
            $statusCode = $exception->statusCode;
            $name = $exception->getName();
            $message = $exception->getMessage();

//            Yii::$app->getSession()->setFlash('alert1', [
//                'type' => 'info',
//                'duration' => 3000,
//                'icon' => 'fa fa-envelope-o',
//                'title' => 'Incoming Request',
//                'message' => 'test hahah',
//                'positonY' => 'top',
//                'positonX' => 'right'
//            ]);

            return $this->render('fault', [
                'exception' => $exception,
                'statusCode' => $statusCode,
                'name' => $name,
                'message' => $message
            ]);
        }
    }
}