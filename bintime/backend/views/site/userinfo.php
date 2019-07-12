
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Alert;
$style = 'border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)';

?>

<div class="site-info">
  <div class="row">
    <div class="col-lg-5">
      <?php $form = ActiveForm::begin(['id' => 'userinfo-form']); ?>

      <?= $form->field($modelFormUsr, 'id')->hiddenInput(['value' => $modelUsr->id])->label(false) ?>

      <?= $form->field($modelFormUsr, 'login')->textInput(['value' => $modelUsr->login , 'style' => $style]) ?>

      <?= $form->field($modelFormUsr, 'firstname')->textInput(['value' => $modelUsr->firstname , 'style' => $style]) ?>

      <?= $form->field($modelFormUsr, 'lastname')->textInput(['value' => $modelUsr->lastname , 'style' => $style]) ?>

      <?= $form->field($modelFormUsr, 'password')->passwordInput(['value' => $modelUsr->password , 'style' => $style]) ?>

      <?= $form->field($modelFormUsr, 'sex')->textInput(['value' => $modelUsr->sex , 'style' => $style]) ?>

      <?= $form->field($modelFormUsr, 'email')->textInput(['value' => $modelUsr->email , 'style' => $style]) ?>

          <div class="form-group">
                   <?= Html::button('Update', ['class' => 'btn btn-primary', 'id' => 'update_user'])  ?>
          </div>

      <?php ActiveForm::end(); ?>

      </div>
  </div>
  <div class="row">
    <h2>Addresses</h2>
    <div class="col-lg-10">

      <?php foreach ($modelAddr as $Addr): ?>

      <?php $form = ActiveForm::begin(['id' => 'addrinfo-form_'.$Addr->id, 'options' => ['style' => 'display: flex;']]); ?>

      <?= $form->field($modelDelAddr, 'id')->hiddenInput(['value' => $Addr->id])->label(false) ?>

      <?= $form->field($modelFormAddr, 'id')->hiddenInput(['value' => $Addr->id])->label(false) ?>

      <?= $form->field($modelFormAddr, 'post_index')->textInput(['value' => $Addr->post_index, 'style' => $style])->label(false) ?>

      <?= $form->field($modelFormAddr, 'country')->textInput(['value' => $Addr->country , 'style' => $style])->label(false) ?>

      <?= $form->field($modelFormAddr, 'city')->textInput(['value' => $Addr->city , 'style' => $style])->label(false) ?>

      <?= $form->field($modelFormAddr, 'street')->textInput(['value' => $Addr->street , 'style' => $style])->label(false) ?>

      <?= $form->field($modelFormAddr, 'house')->textInput(['value' => $Addr->house , 'style' => $style])->label(false) ?>

      <?= $form->field($modelFormAddr, 'apartment')->textInput(['value' => $Addr->apartment , 'style' => $style])->label(false) ?>



          <div class="form-group">
                   <?= Html::button('Update', ['class' => 'btn btn-primary', 'id' => 'update_address',
                                               'onclick' => '
                                                 $.post("http://127.0.0.1/admin/index.php?r=api/update-address", $("#addrinfo-form_'.$Addr->id.'").serialize());
                                                '])  ?>
          </div>
          <div class="form-group">
                   <?= Html::button('Delete', ['class' => 'btn btn-primary', 'id' => 'delete_address', 'style' => 'margin-left: 5px;',
                                                'onclick' => '
                                                  $.post("http://127.0.0.1/admin/index.php?r=api/delete-address", $("#addrinfo-form_'.$Addr->id.'").serialize())
                                                  .done(function() {
                                                          $("#addrinfo-form_'.$Addr->id.'").remove();
                                                   });;
                                                  '])  ?>
          </div>
      <?php ActiveForm::end(); ?>


      <?php endforeach; ?>

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
});

');
