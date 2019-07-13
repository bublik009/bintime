<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Users;
use app\models\Addresses;
use app\models\UpdateUser;
use app\models\UpdateAddress;
use app\models\DeleteAddress;
use app\models\AddAddress;
use app\models\DeleteUser;
/**
 * Site controller
 */
class SiteController extends Controller
{
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

        return $this->render('usrlist', [
            'model' => $model->find(),
        ]);

    }
    public function actionAddressList()
    {

      $model = new Addresses();

        return $this->render('addrlist', [
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
      $modelDelUsr = new DeleteUser();
      $modelNewAddr = new AddAddress();
      if(Yii::$app->request->get('id'))
      {
        $id = Yii::$app->request->get('id');
        return $this->render('userinfo', [
            'modelFormUsr' => $modelFormUsr,
            'modelFormAddr' => $modelFormAddr,
            'modelUsr' => $modelUsr->findOne($id),
            'modelAddr' => $modelAddr->find()->select('id, post_index ,country, city, street, house, apartment')->where(['user_id' => $id])->all(),
            'modelDelAddr' => $modelDelAddr,
            'modelDelUsr' =>$modelDelUsr,
            'modelNewAddr' => $modelNewAddr
        ]);
      }

    }

}
