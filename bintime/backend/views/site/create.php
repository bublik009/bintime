<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Alert;
 $this->title = 'User creating';
 $this->params['breadcrumbs'][] = $this->title;
 ?>
 <div class="site-create">
     <h1><?= Html::encode($this->title) ?></h1>

     <p>Please fill out the following fields to create user:</p>

     <div class="row">
         <div class="col-lg-5">
           <?php $form = ActiveForm::begin(['id' => 'create-form', 'options' => ['data-pjax' => true]]); ?>

               <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

               <?= $form->field($model, 'firstname')->textInput() ?>

               <?= $form->field($model, 'lastname')->textInput() ?>

               <?= $form->field($model, 'password')->passwordInput() ?>

               <?= $form->field($model, 'sex')->textInput() ?>

               <?= $form->field($model, 'email')->textInput() ?>

               <?= $form->field($model, 'post_index')->textInput() ?>

               <?= $form->field($model, 'country')->textInput() ?>

               <?= $form->field($model, 'city')->textInput() ?>

               <?= $form->field($model, 'street')->textInput() ?>

               <?= $form->field($model, 'house')->textInput() ?>

               <?= $form->field($model, 'apartment')->textInput() ?>

               <div class="form-group">
                        <?= Html::button('Create', ['class' => 'btn btn-primary', 'id' => 'create_user']) ?>
               </div>

           <?php ActiveForm::end(); ?>
         </div>
     </div>
 </div>
 <?php
     $this->registerJs(
      "
      $('#create_user').click(function(){
        $.post('http://127.0.0.1/admin/index.php?r=api/create-user', $('#create-form').serialize());
        function onAjaxSuccess(data)
        {
          console.log('adad');
        }
      });
      "
     );
 ?>
