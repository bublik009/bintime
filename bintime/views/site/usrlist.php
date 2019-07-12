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
        [
           'format' => 'raw',
           'value' => function($model){
          	 return Html::a('View', ['site/user-info', 'id' => $model->id]).Html::a('Delete', ['site/user-info&id='.$model->id]);
           },
        ],
      ]

]);
 ?>
