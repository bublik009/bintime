<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
Modal::begin([
   'header'=>'<h4>Job Created</h4>',
   'id'=>'modal',
   'toggleButton' => ['label' => 'click me'],
   'size'=>'modal-lg',
]);

echo "<div id='modalContent'></div>";
Modal::end();
?>
