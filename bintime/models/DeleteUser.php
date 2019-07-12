z<?php
namespace app\models;

use yii\base\Model;
use app\models\Users;


class DeleteUser extends Model
{
  public $id;


  public function rules()
  {
    return
    [
      [['id'], 'required'],
    ];
  }
  public function delete()
  {
    $modelTblUsers = new Users();
    $modelUser = $modelTblUsers->findOne($this->id);
    return ($modelUser->delete()) ? true : false;
  }
}
 ?>
