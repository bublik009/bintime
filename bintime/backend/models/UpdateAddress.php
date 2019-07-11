<?php
namespace backend\models;

use yii\base\Model;
use backend\models\Users;
use backend\models\Addresses;

class CreateUserForm extends Model
{
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

    $modelTblAddresses = new Addresses();
    $modelAddress = $modelTblAddresses->findOne($this->id);
    $modelAddress->post_index = $this->post_index;
    $modelAddress->country = $this->country;
    $modelAddress->city = $this->city;
    $modelAddress->street = $this->street;
    $modelAddress->house = $this->house;
    $modelAddress->apartment = $this->apartment;
    return ($modelAddress->save()) ? true : false;
  }
}
 ?>
