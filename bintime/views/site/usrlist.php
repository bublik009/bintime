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
        'login',
        'firstname',
        'lastname',
        'password',
        'email',
        'creating_date',
        [
           'format' => 'raw',
           'value' => function($model){
          	 return Html::a('View', ['site/user-info', 'id' => $model->id]).' '.
             '<a onclick = "$.post(\'http://127.0.0.1/index.php?r=api/delete-user\',
             {id: '.$model->id.'}).done(function() {
                $(\'[data-key ~='.$model->id.']\').remove();
              });">Delete</a>';
           },
        ],
      ]

]);
 ?>
