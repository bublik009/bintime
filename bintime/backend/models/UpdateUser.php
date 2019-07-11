<?php
namespace backend\models;

use yii\base\Model;
use backend\models\Users;


class CreateUser extends Model
{
  public $login;
  public $firstname;
  public $lastname;
  public $password;
  public $sex;
  public $email;


  public function rules()
  {
    return
    [
      [['sex'], 'in', 'range' => [1, 2]],
      [['login'], 'string', 'min' => 2, 'max' => 20],
      [['firstname'], 'string', 'min' => 2, 'max' => 20],
      [['lastname'], 'string', 'min' => 3, 'max' => 20],
      [['password'], 'string', 'min' => 6, 'max' => 100],
      [['email'], 'email']
    ];
  }
  public function save($id)
  {
    $modelTblUsers = new Users();
    $modelUser = $modelTblUsers->findOne($id);
    $modelUser->login = $this->login;
    $modelUser->firstname = $this->firstname;
    $modelUser->lastname = $this->lastname;
    $modelUser->password = $this->password;
    $modelUser->sex = $this->sex;
    $modelUser->email = $this->email;
    return ($modelUser->save()) ? true : false;
  }
}
 ?>
