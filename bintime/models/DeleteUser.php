<?php
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
    $modelTblAddresses = new Addresses();
    $modelUser = $modelTblUsers->findOne($this->id);

    return ($modelUser->delete() && $modelTblAddresses->deleteAll(['user_id' => $this->id])) ? true : false;
  }
}
 ?>
