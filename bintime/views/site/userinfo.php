
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
$style = 'border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)';

?>

<div class="site-info">
  <div class="row">
    <div class="col-lg-5">
      <?php $form = ActiveForm::begin(['id' => 'userinfo-form']); ?>

      <?= $form->field($modelDelUsr, 'id')->hiddenInput(['value' => $modelUsr->id])->label(false) ?>

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
          <div class="form-group">
                   <?= Html::button('Delete', ['class' => 'btn btn-primary', 'id' => 'delete_user'])  ?>
          </div>
      <?php ActiveForm::end(); ?>

      </div>
  </div>
  <div class="row">
    <h2>Addresses</h2>
    <div class="col-lg-10">
      <?php Pjax::begin() ?>
      <a id="rerender" href="http://127.0.0.1/index.php?r=site/user-info&id=<?= $modelUsr->id?>" style="display: none;"></a>
      <table>


      <?php foreach ($modelAddr as $Addr): ?>
        <tr id="addrrow_<?= $Addr->id?>">

          <td>
          <input type="text" id="post_index_<?= $Addr->id?>"
           class="form-control"
           name="UpdateAddress[city]" value="<?= $Addr->post_index?>"
           style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
          </td>
          <td>
          <input type="text" id="country_<?= $Addr->id?>"
           class="form-control"
           name="UpdateAddress[city]" value="<?= $Addr->country?>"
           style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
          </td>
          <td>
          <input type="text" id="city_<?= $Addr->id?>"
           class="form-control"
           name="UpdateAddress[city]" value="<?= $Addr->city?>"
           style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
          </td>
          <td>
          <input type="text" id="street_<?= $Addr->id?>"
           class="form-control"
           name="UpdateAddress[city]" value="<?= $Addr->street?>"
           style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
          </td>
          <td>
          <input type="text" id="house_<?= $Addr->id?>"
           class="form-control"
           name="UpdateAddress[city]" value="<?= $Addr->house?>"
           style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
          </td>
          <td>
          <input type="text" id="apartment_<?= $Addr->id?>"
           class="form-control"
           name="UpdateAddress[city]" value="<?= $Addr->apartment?>"
           style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
          </td>
          <td>
          <button
           class="btn btn-primary"
           onclick = '

           $.post("http://127.0.0.1/index.php?r=api/update-address", {
                UpdateAddress: {id: <?= $Addr->id?>,
                                post_index: $("#post_index_<?= $Addr->id?>").val(),
                                country: $("#country_<?= $Addr->id?>").val(),
                                city: $("#city_<?= $Addr->id?>").val(),
                                street: $("#street_<?= $Addr->id?>").val(),
                                house: $("#house_<?= $Addr->id?>").val(),
                                apartment: $("#apartment_<?= $Addr->id?>").val()}
           }).done(function(){
             $("#rerender").click();
           });
           '>Update</button>
           <button
            class="btn btn-primary"
            onclick = '

            $.post("http://127.0.0.1/admin/index.php?r=api/delete-address", {
                 DeleteAddress: {id: <?= $Addr->id?>}
            }).done(function() {
                    document.getElementById("rerender").click();
             });
            '>Delete</button>
          </td>
        </tr>
      <?php endforeach; ?>

    </table>
    <?php Pjax::end() ?>


  </div>
</div>
<?php

Modal::begin([
   'header'=>'<h2>Add Address</h2>',
   'id'=>'modal',
   'toggleButton' => ['label' => 'Add Address', 'class' => 'btn btn-primary'],
   'size'=>'modal-lg',
   'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
]);

 $form = ActiveForm::begin(['id' => 'newaddr-form']); ?>

<?= $form->field($modelNewAddr, 'user_id')->hiddenInput(['value' => $modelUsr->id])->label(false) ?>

<?= $form->field($modelNewAddr, 'post_index_new')->textInput()->label('Post Index') ?>

<?= $form->field($modelNewAddr, 'country_new')->textInput()->label('Country') ?>

<?= $form->field($modelNewAddr, 'city_new')->textInput()->label('City') ?>

<?= $form->field($modelNewAddr, 'street_new')->passwordInput()->label('Street') ?>

<?= $form->field($modelNewAddr, 'house_new')->textInput()->label('House') ?>

<?= $form->field($modelNewAddr, 'apartment_new')->textInput()->label('Apartment') ?>

    <div class="form-group">
             <?= Html::button('Add', ['class' => 'btn btn-primary', 'id' => 'add_address', 'onclick' => '

             $.post("http://127.0.0.1/index.php?r=api/add-address", $("#newaddr-form").serialize()).done(function(){
               $("#modal").attr("style", "display: none;");
               $("#rerender").click();
             });
             '])  ?>
    </div>
<?php ActiveForm::end();
Modal::end();?>
</div>

<?php
$this->registerJs('
$(".row").find("input").focusout(function(){
  $(this).attr("style", "'.$style.'");
});
$(".row").find("input").focus(function(){
  $(this).removeAttr("style");
});
$("#update_user").click(function(){
  $.post("http://127.0.0.1/index.php?r=api/update-user", $("#userinfo-form").serialize());
});
$("#delete_user").click(function(){
  $.post("http://127.0.0.1/index.php?r=api/delete-user", $("#userinfo-form").serialize());
});
');
