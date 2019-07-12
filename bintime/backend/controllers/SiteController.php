<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\User;
use backend\models\Users;
use backend\models\Addresses;
use backend\models\UpdateUser;
use backend\models\UpdateAddress;
use backend\models\DeleteAddress;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
     /*
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
*/
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionCreateUser()
    {

      $modelForm = new User();
        return $this->render('create', [
            'model' => $modelForm,
        ]);

    }

    public function actionUserList()
    {

      $model = new Users();

        return $this->render('list', [
            'model' => $model->find(),
        ]);

    }
    public function actionAddressesList()
    {

      $model = new Addresses();

        return $this->render('list', [
            'model' => $model->find(),
        ]);

    }
    public function actionUserInfo()
    {
      $modelUsr = new Users();
      $modelAddr = new Addresses();
      $modelFormUsr = new UpdateUser();
      $modelFormAddr = new UpdateAddress();
      $modelDelAddr = new DeleteAddress();
      if(Yii::$app->request->get('id'))
      {
        $id = Yii::$app->request->get('id');
        return $this->render('userinfo', [
            'modelFormUsr' => $modelFormUsr,
            'modelFormAddr' => $modelFormAddr,
            'modelUsr' => $modelUsr->findOne($id),
            'modelAddr' => $modelAddr->find()->select('id, post_index ,country, city, street, house, apartment')->where(['user_id' => $id])->all(),
            'modelDelAddr' => $modelDelAddr,
        ]);
      }

    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
