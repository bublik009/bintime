<?php
namespace app\models;

use yii\base\Model;

use app\models\Addresses;

class AddAddress extends Model
{
  public $user_id;
  public $post_index_new;
  public $country_new;
  public $city_new;
  public $street_new;
  public $house_new;
  public $apartment_new;

  public function rules()
  {
    return
    [
      [['user_id', 'post_index_new', 'country_new', 'city_new', 'street_new', 'house_new'], 'required'],
      [['post_index_new'], 'integer', 'min' => 1, 'max' => 100000],
      [['country_new'], 'string', 'min' => 2, 'max' => 2],
      [['city_new'], 'string', 'min' => 1, 'max' => 20],
      [['street_new'], 'string', 'min' => 1, 'max' => 50],
      [['house_new'], 'string', 'min' => 1, 'max' => 20],
      [['apartment_new'], 'integer', 'min' => 1, 'max' => 10000],
    ];
  }
  public function save()
  {

    $modelTblAddresses = new Addresses();

    $modelTblAddresses->user_id = $this->user_id;
    $modelTblAddresses->post_index = $this->post_index_new;
    $modelTblAddresses->country = $this->country_new;
    $modelTblAddresses->city = $this->city_new;
    $modelTblAddresses->street = $this->street_new;
    $modelTblAddresses->house = $this->house_new;
    $modelTblAddresses->apartment = $this->apartment_new;
    return ($modelTblAddresses->save()) ? true : false;
  }

}
 ?>
