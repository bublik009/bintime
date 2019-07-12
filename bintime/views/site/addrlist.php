<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$dataProvider = new ActiveDataProvider([
    'query' => $model,
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => function($data){
      $array = [];
      foreach ($data as $value) {
        $array[] = array_search($value, $data);
      }
      exit(var_dump($array));
      return $array;
    }
]);
 ?>
