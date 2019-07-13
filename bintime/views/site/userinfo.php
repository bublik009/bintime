
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Alert;
function getAddrRow($Addr)
{
  if(!is_object($Addr))
  {
    return 'argument is not object';
  }
  else
  {
    return '
    <tr id="addrrow_'. $Addr->id.'">
      <td>
      <input type="text" id="post_index_'. $Addr->id.'"
       class="form-control"
       name="UpdateAddress[city]" value="'. $Addr->post_index.'"
       style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
      </td>
      <td>
      <input type="text" id="country_'. $Addr->id.'"
       class="form-control"
       name="UpdateAddress[city]" value="'. $Addr->country.'"
       style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
      </td>
      <td>
      <input type="text" id="city_'. $Addr->id.'"
       class="form-control"
       name="UpdateAddress[city]" value="'. $Addr->city.'"
       style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
      </td>
      <td>
      <input type="text" id="street_'. $Addr->id.'"
       class="form-control"
       name="UpdateAddress[city]" value="'. $Addr->street.'"
       style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
      </td>
      <td>
      <input type="text" id="house_'. $Addr->id.'"
       class="form-control"
       name="UpdateAddress[city]" value="'. $Addr->house.'"
       style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
      </td>
      <td>
      <input type="text" id="apartment_'. $Addr->id.'"
       class="form-control"
       name="UpdateAddress[city]" value="'. $Addr->apartment.'"
       style="border: transparent; background: transparent; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0)">
      </td>
      <td>
      <button
       class="btn btn-primary"
       onclick = "

              $.post(\"http://127.0.0.1/admin/index.php?r=api/update-address\", {
                   UpdateAddress: {id: '. $Addr->id.',
                                   post_index: $(\"#post_index_'. $Addr->id.'\").val(),
                                   country: $(\"#country_'. $Addr->id.'\").val(),
                                   city: $(\"#city_'. $Addr->id.'\").val(),
                                   street: $(\"#street_'. $Addr->id.'\").val(),
                                   house: $(\"#house_'. $Addr->id.'\").val(),
                                   apartment: $(\"#apartment_'. $Addr->id.'\").val()}
              });
       ">Update</button>
       <button
        class="btn btn-primary"
        onclick = "
        $.post(\"http://127.0.0.1/admin/index.php?r=api/delete-address\", {
             DeleteAddress: {id: '. $Addr->id.'}
        }).done(function() {
                $(\"#addrow_'. $Addr->id .'\").remove();
         });
        ">Delete</button>
      </td>
    </tr>';

  }

}
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
      <table id="address-list">
      <?php foreach ($modelAddr as $Addr): ?>
        <?= getAddrRow($Addr) ?>
      <?php endforeach; ?>
    </table>
    <button
     class="btn btn-primary"
     onclick = '$("#address-list").append("<?= getAddrRow((object)['id'=>'new',
                                                                   'post_index'=>'',
                                                                   'country'=>'',
                                                                   'city'=>'',
                                                                   'street'=>'',
                                                                   'house'=>'',
                                                                   'apartment'=>'']) ?>");'>Add</button>
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
  $.post("http://127.0.0.1/index.php?r=api/update-user", $("#userinfo-form").serialize());
});
$("#delete_user").click(function(){
  $.post("http://127.0.0.1/index.php?r=api/delete-user", $("#userinfo-form").serialize());
});
');
