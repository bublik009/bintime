
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\bootstrap\Alert;
$style = 'border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)';
?>

<div class="site-info">
  <div class="row">
    <div class="col-lg-5">
      <?php $form = ActiveForm::begin(['id' => 'userinfo-form']); ?>
      
      <?= $form->field($model, 'id')->hiddenInput(['value' => $modelUsr->id])->label(false) ?>

      <?= $form->field($model, 'login')->textInput(['value' => $modelUsr->login , 'style' => $style]) ?>

      <?= $form->field($model, 'firstname')->textInput(['value' => $modelUsr->firstname , 'style' => $style]) ?>

      <?= $form->field($model, 'lastname')->textInput(['value' => $modelUsr->lastname , 'style' => $style]) ?>

      <?= $form->field($model, 'password')->passwordInput(['value' => $modelUsr->password , 'style' => $style]) ?>

      <?= $form->field($model, 'sex')->textInput(['value' => $modelUsr->sex , 'style' => $style]) ?>

      <?= $form->field($model, 'email')->textInput(['value' => $modelUsr->email , 'style' => $style]) ?>

          <div class="form-group">
                   <?= Html::button('Update', ['class' => 'btn btn-primary', 'id' => 'update_user'])  ?>
          </div>

      <?php ActiveForm::end(); ?>
      </div>
  </div>
</div>
<?php
$this->registerJs('
$("input").focusout(function(){
  $(this).attr("style", "'.$style.'");
});
$("input").focus(function(){
  $(this).removeAttr("style");
});
$("#update_user").click(function(){
  $.post("http://127.0.0.1/admin/index.php?r=api/update-user", $("#userinfo-form").serialize());
  function onAjaxSuccess(data)
  {
    console.log("adad");
  }
});
');
