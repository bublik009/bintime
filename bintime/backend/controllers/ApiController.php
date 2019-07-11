<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\User;
use backend\models\Address;
use backend\models\UpdateUser;
use backend\models\UpdateAddress;

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
        return 'a';
      }
      else
      {
        return json_encode(Yii::$app->request->post("User"));
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
      $model = new User();

      if($model->load(Yii::$app->request->post()) && $model->validate() && $model->delete($model->id))
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
      $model = new Address();

      if($model->load(Yii::$app->request->post()) && $model->validate() && $model->delete($model->id))
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
