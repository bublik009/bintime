<?php
namespace backend\models;

use yii\db\ActiveRecord;

class Addresses extends ActiveRecord
{
    public static function tableName()
    {
        return '{{addresses}}';
    }
}
