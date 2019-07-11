<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\CreateUserForm;
/**
 * Site controller
 */
class ApiController extends Controller
{
  public function actionCreateUser()
  {
    if(Yii::$app->request->isAjax)
    {
      $model = new CreateUserForm();

      if($model->load(Yii::$app->request->post()) && $model->validate() && $model->save())
      {
        return 'a';
      }
      else
      {
        return json_encode(Yii::$app->request->post("CreateUserForm"));
      }
    }
  }

  public function actionUpdateUser()
  {
    public function actionCreateUser()
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
          return json_encode(Yii::$app->request->post("CreateUserForm"));
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
        return json_encode(Yii::$app->request->post("CreateUserForm"));
      }
    }
  }

  public function actionAddAddress()
  {
    if(Yii::$app->request->isAjax)
    {
      $model = new AddAddress();

      if($model->load(Yii::$app->request->post()) && $model->validate() && $model->save())
      {
        return 'a';
      }
      else
      {
        return json_encode(Yii::$app->request->post("CreateUserForm"));
      }
  }
}
