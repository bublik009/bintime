<?php
namespace app\models;

use yii\base\Model;
use app\models\Users;
use app\models\Addresses;

class User extends Model
{
  public $login;
  public $firstname;
  public $lastname;
  public $password;
  public $sex;
  public $email;
  public $post_index;
  public $country;
  public $city;
  public $street;
  public $house;
  public $apartment;
  public $id;
  public function rules()
  {
    return
    [
      [['sex'], 'in', 'range' => [1, 2]],
      [['login'], 'string', 'min' => 2, 'max' => 20],
      [['firstname'], 'string', 'min' => 2, 'max' => 20],
      [['lastname'], 'string', 'min' => 3, 'max' => 20],
      [['password'], 'string', 'min' => 6, 'max' => 100],
      [['email'], 'email'],
      [['post_index'], 'integer', 'min' => 1, 'max' => 100000],
      [['country'], 'string', 'min' => 2, 'max' => 2],
      [['city'], 'string', 'min' => 1, 'max' => 20],
      [['street'], 'string', 'min' => 1, 'max' => 50],
      [['house'], 'string', 'min' => 1, 'max' => 20],
      [['apartment'], 'integer', 'min' => 1, 'max' => 10000],
    ];
  }
  public function save()
  {
    $modelTblUsers = new Users();
    $modelTblAddresses = new Addresses();
    $modelTblUsers->login = $this->login;
    $modelTblUsers->firstname = $this->firstname;
    $modelTblUsers->lastname = $this->lastname;
    $modelTblUsers->password = $this->password;
    $modelTblUsers->sex = $this->sex;
    $modelTblUsers->email = $this->email;
    $modelTblUsers->save();

    $modelTblAddresses->user_id = ((new Users())->find()->where(['email' => $this->email])->one())->id;
    $modelTblAddresses->post_index = $this->post_index;
    $modelTblAddresses->country = $this->country;
    $modelTblAddresses->city = $this->city;
    $modelTblAddresses->street = $this->street;
    $modelTblAddresses->house = $this->house;
    $modelTblAddresses->apartment = $this->apartment;
    return ($modelTblUsers->save() && $modelTblAddresses->save()) ? true : false;
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
