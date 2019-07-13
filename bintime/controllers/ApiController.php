<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\User;
use app\models\Address;
use app\models\UpdateUser;
use app\models\UpdateAddress;
use app\models\DeleteAddress;
use app\models\DeleteUser;
/**
 * Site controller
 */
class ApiController extends Controller
{
  public function actionCreateUser()
  {
    if(Yii::$app->request->isAjax)
    {
      $model = new User();

      if($model->load(Yii::$app->request->post()) && $model->validate() && $model->save())
      {
        return 'a';
      }
      else
      {
        return json_encode(Yii::$app->request->post("User"));
      }
    }
  }

  public function actionUpdateUser()
  {

      if(Yii::$app->request->isAjax)
      {
        $model = new UpdateUser();

        if($model->load(Yii::$app->request->post()) && $model->validate() && $model->save())
        {
          return 'a';
        }
        else
        {
          return json_encode(Yii::$app->request->post("User"));
        }
      }
  }

  public function actionUpdateAddress()
  {
    if(Yii::$app->request->isAjax)
    {
      $model = new UpdateAddress();

      if($model->load(Yii::$app->request->post()) && $model->validate() && $model->save())
      {
        var_dump($model);
      }
      else
      {
        return json_encode(Yii::$app->request->post());
      }
    }
  }

  public function actionAddAddress()
  {
    if(Yii::$app->request->isAjax)
    {
      $model = new Address();

      if($model->load(Yii::$app->request->post()) && $model->validate() && $model->save())
      {
        return 'a';
      }
      else
      {
        return json_encode(Yii::$app->request->post("User"));
      }
    }
  }
  public function actionDeleteUser()
  {
    if(Yii::$app->request->isAjax)
    {
      $model = new DeleteUser();

      if(($model->load(Yii::$app->request->post()) || $model->id = Yii::$app->request->post('id')) && $model->validate() && $model->delete())
      {
        return 'a';
      }
      else
      {
        return json_encode(Yii::$app->request->post("User"));
      }
    }
  }
  public function actionDeleteAddress()
  {
    if(Yii::$app->request->isAjax)
    {
      $model = new DeleteAddress();

      if(($model->load(Yii::$app->request->post()) || $model->id = Yii::$app->request->post('id')) && $model->validate() && $model->delete())
      {
        return 'a';
      }
      else
      {
        return json_encode(Yii::$app->request->post("User"));
      }
    }
  }
}
