<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\BareactMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAct */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
?>

<!---code for tabs------->
<?= $this->render("/judgment-mast/view_tabs") ?>
<!---end of code for tabs------->

<!------start of form------>

<div class="judgment-act-form">
    <?php
    if($_GET)
{
    $jcode = $_GET['jcode'];
   
    $doc_id = $_GET['doc_id'];
}
$judgment = ArrayHelper::map(JudgmentMast::find()->where(['judgment_code'=>$jcode])->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
foreach ($judgment as $key => $judgment_value) {
    $judgment_value;
}

?>

    <?php $form = ActiveForm::begin(); ?>
    <hr>
 <div class="row">  
 <div class="col-md-2 col-xs-12">
    <label style="float: right;">Judgment Title</label>
 </div>
  
    <div class="col-md-6 col-xs-12">

 <?= $form->field($model, 'judgment_title')->textInput(['maxlength' => true ,'readonly'=>true,'value' => $judgment_value])->label(false) ?>
</div>
<div class="col-md-4 col-xs-12">
 </div> 
</div>
<?php
/*$array = ['type' => 'A', 'options' => [1, 2]];
echo $type = ArrayHelper::getValue($array, 'type');
$data = [
    ['id' => '123', 'data' => 'abc'],
    ['id' => '345', 'data' => 'def'],
];
$ids = ArrayHelper::getColumn($data, 'id');
print_r($ids);*/
?>
<div id="js_val">
    
</div>



<?php
 //echo "hello : ";
 // echo $content = "<script>document.getElementById(js_val);</script>";
?>
 <div class="row">  
<div class="col-md-3 col-xs-12">

     <?php  $bareactmast  = ArrayHelper::map(BareactMast::find()->all(), 'bareact_code', 'bareact_desc'); ?>
    

      <?= $form->field($model, 'bareact_desc')->widget(Select2::classname(), [            
            'data' => $bareactmast,

            'options' => ['placeholder' => 'Select Barect', 'value' => $model->bareact_code, ],
            'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();  
                //$('#js_val').append(val);
            //console.log('val',val);              
              $('#judgmentact-bareact_code').val(val);

                    $.ajax({
                      url      : '/advanced_yii/judgment-act/bareact?id='+val,
                     
                      success  : function(data) {
                      let jdata = JSON.parse(data);
                      let catg_desc='';
                      let checkbox = '';
                       //console.log(typeof jdata);
                       jdata.forEach(function(e){
                        //console.log('e',e)
                        catg_desc = e.act_catg_desc;
                        catg_code = e.act_catg_code;
                        sub_desc  = e.act_sub_catg_desc;
                        sub_code  = e.act_sub_catg_code;
                        group_desc = e.act_group_desc;
                        group_code = e.act_group_code;
                        act_title  = e.act_title;
                        console.log(act_title);
                        checkbox = checkbox + '<input type=checkbox name=JudgmentAct[act_title] value=' + act_title + '>'+act_title+ '<br />';
                        });
                        //alert(checkbox);
                        $('.act_row').html(checkbox);
                        $('#judgmentact-act_catg_desc').val(catg_desc); 
                        $('#judgmentact-act_catg_code').val(catg_code);
                        $('#judgmentact-act_sub_catg_desc').val(sub_desc);
                        $('#judgmentact-act_sub_catg_code').val(sub_code);
                        $('#judgmentact-act_group_desc').val(group_desc);
                        $('#judgmentact-act_group_code').val(group_code);
                                }    

                      });
             }"
            ]
            ]); ?>        
    </div>
    <div class="act_data">
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_catg_desc')->textInput(['maxlength' => true ,'value' => ''])->label('Main Act Category') ?>
         <?= $form->field($model, 'act_catg_code')->hiddenInput(['maxlength' => true ,'value' => ''])->label(false) ?>
    </div>
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_sub_catg_desc')->textInput(['maxlength' => true ,'value' => ''])->label('Act SubCategory') ?>
         <?= $form->field($model, 'act_sub_catg_code')->hiddenInput(['maxlength' => true ,'value' => ''])->label(false) ?>
    </div>  
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_group_desc')->textInput(['maxlength' => true ,'value' => ''])->label('Group') ?>
         <?= $form->field($model, 'act_group_code')->hiddenInput(['maxlength' => true ,'value' => ''])->label(false) ?>
    </div>  
    </div>
    <div>
        
    </div>
    <div class="act_row">
      
    </div>
    <p></p>

 <div class="col-md-4 col-xs-12">

    <?= $form->field($model, 'j_doc_id')->hiddenInput(['maxlength' => true ,'readonly'=>true,'value' => $doc_id])->label(false) ?>
    <?php //echo $form->field($model, 'judgment_code')->textInput(['readonly'=>true,'value' => $jcode])->label(false) ?>
    <?= $form->field($model, 'bareact_code')->hiddenInput(['maxlength' => true])->label(false) ?>
    <?php //echo  $form->field($model, 'doc_id[]')->textInput(['maxlength' => true,'class'=>'test'])->label(false) ?>

</div>
 <div class="col-md-4 col-xs-12">
 
    
   

</div>

</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!------end of form------>
<!------add judgment text------>
<?= $this->render("/judgment-mast/judgment_text_add") ?>
<!------judgment text------>
