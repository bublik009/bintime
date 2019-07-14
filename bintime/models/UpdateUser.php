<?php
namespace app\models;

use yii\base\Model;
use app\models\Users;


class UpdateUser extends Model
{
  public $id;
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
      [['id', 'login', 'firstname', 'lastname', 'password', 'email', 'sex'], 'required'],
      [['sex'], 'in', 'range' => [1, 2]],
      [['login'], 'string', 'min' => 2, 'max' => 20],
      [['firstname'], 'string', 'min' => 2, 'max' => 20],
      [['lastname'], 'string', 'min' => 3, 'max' => 20],
      [['password'], 'string', 'min' => 6, 'max' => 100],
      [['email'], 'email']
    ];
  }
  public function save()
  {

    $modelTblUsers = new Users();
    if($modelTblUsers->find()->where(['email' => $this->email])->count() > 0)
    {
      return false;
    }
    $modelUser = $modelTblUsers->findOne($this->id);
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
