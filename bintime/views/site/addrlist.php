<?php
use yii\helpers\Html;
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
    'columns' => [
        'user_id',
        'post_index',
        'country',
        'city',
        'street',
        'house',
        'apartment',
        [
           'format' => 'raw',
           'value' => function($model){
          	 return Html::a('View', ['site/user-info', 'id' => $model->user_id]).' '.
             '<a onclick = "$.post(\'http://127.0.0.1/index.php?r=api/delete-address\',
             {id: '.$model->id.'}).done(function() {
                $(\'[data-key ~='.$model->id.']\').remove();
              });">Delete</a>';
           },
        ],
      ]

]);
  ?>
