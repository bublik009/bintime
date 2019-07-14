<?php
namespace app\models;

use yii\base\Model;

use app\models\Addresses;

class DeleteAddress extends Model
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

    $modelTblAddresses = new Addresses();

    $modelAddress = $modelTblAddresses->findOne($this->id);
    if($modelTblAddresses->find()->where(['user_id' => $modelAddress->user_id])->count() < 2)
    {
      return false;
    }
    return ($modelAddress->delete()) ? true : false;
  }
}
 ?>
