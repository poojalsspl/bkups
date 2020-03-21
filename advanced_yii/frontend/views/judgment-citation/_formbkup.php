<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentCitation;


/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentCitation */
/* @var $form yii\widgets\ActiveForm */

 //$journal = ArrayHelper::map(JournalMast::find()->all(), 'journal_code', 'journal_name');

    $jcode  = '';
   // $doc_id = '';
    
if($_GET)
{
    $jcode  = $_GET['jcode'];
   // $doc_id  = $_GET['doc_id'];
   
}

$judgment = ArrayHelper::map(JudgmentMast::find()->where(['judgment_code'=>$jcode])->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });

?>

<div class="judgment-citation-form">
  <div class="box box-danger col-md-12">
         <?php if($model->isNewRecord) { ?>
            <?php $form = ActiveForm::begin(['method'=>'post']); ?>
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
            'data' => $judgment,
            'disabled'=>true,
            'initValueText' => $jcode,        
            'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],
            ]); ?>

      <div class="dynamic-rows rows col-xs-12">   
      <div class="dynamic-rows-field row">
    
        <div class="col-xs-6">
             <?= $form->field($model, (!$model->isNewRecord) ? 'citation' : 'citation[]' )->textInput(['maxlength' => true,
                'class'=>'judgmentcitation-citation form-control']) ?> 
        </div>
        <div class="col-xs-2">
        </div>
       
     </div>
     </div>
     <div class="row form-group">
    <div class="col-xs-4">
        <?= Html::button($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>
    </div>
    <div class="col-xs-8"> 
    <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
    <?php if($model->isNewRecord) { ?>
    <?= Html::button('Show Data', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info generate-row']) ?>
    <?php } ?> 
    </div>
    </div> 
    <?php ActiveForm::end(); ?>
    <?php } ?>
    <?php if(!$model->isNewRecord) { ?>
    <?php $form = ActiveForm::begin(['method'=>'post']); ?>  
    <div class="box-header with-border">
    <h3 class="box-title"></h3>
    </div>
    <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    'disabled'=>true,
     'initValueText' => $jcode,        
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],
     ]); ?>
     <div class="dynamic-rows rows col-xs-12">
        <?php $citation = JudgmentCitation::find()->where(['judgment_code'=>$model->judgment_code])->all();
        foreach ($citation as $jdg) { ?>
            <div class="dynamic-rows-field row">
                <div class="col-xs-6">
                <div class="form-group field-judgmentcitation-citation has-success">
                <label class="control-label" for="judgmentcitation-citation">Citation</label>
                <input type="text" id="judgmentcitation-citation" class="judgmentcitation-citation form-control" name="JudgmentCitation[citation][]" value="<?= $jdg->citation ?>" maxlength="50" aria-invalid="false">
                <div class="help-block"></div>
                </div> 
            </div>
            <div class="col-xs-2">            
            </div> 
            </div>
            <?php } ?>
      </div>
    <div class="row form-group">
    <div class="col-xs-4">
        <?= Html::button($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>
    </div>
    <div class="col-xs-8"> 
    <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
    <?php if($model->isNewRecord) { ?> 
    <?= Html::button('Show Data', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info generate-row']) ?>  
    <?php  } ?>  
    </div>
    </div>
    <?php ActiveForm::end(); ?>

    <?php } ?>
        </div>
</div>
<?php 
if($model->isNewRecord){
    $customScript = <<< SCRIPT
    $('.addr-row').on('click',function(){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="col-xs-6"><div class="form-group field-judgmentcitation-citation has-success"><label class="control-label" for="judgmentcitation-citation">Citation</label><input type="text" id="judgmentcitation-citation" class="form-control judgmentcitation-citation" name="JudgmentCitation[citation][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentcitation-citation').each(function(){   
        if($(this).val()=='')
        {
            alert('Can not be Empty');
            $(this).focus();
            return false;   
        }
        
    });     
     $('#submit-button').attr('type','submit');
 });
 SCRIPT;
}
else{
        $customScript = <<< SCRIPT
    $('.addr-row').on('click',function(){
        $('.judgmentcitation-citation').attr('name','JudgmentCitation[citation][]')
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="col-xs-6"><div class="form-group field-judgmentcitation-citation has-success"><label class="control-label" for="judgmentcitation-citation">Citation</label><input type="text" id="judgmentcitation-citation" class="form-control judgmentcitation-citation" name="JudgmentCitation[citation][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentcitation-citation').each(function(){
        if($(this).val()=='')
        {
            alert('Can not be Empty');
            $(this).focus();
            return false;   
        }
        
    });     
     $('#submit-button').attr('type','submit');
 });


SCRIPT;


}
    $this->registerJs($customScript, \yii\web\View::POS_READY);
 ?>
 <?php 
$customScript = <<< SCRIPT
$('.generate-row').on('click', function(){
 var citation =  $('#judgmentcitation-citation').val();
 console.log(citation);
 if(citation=='')
 {
    alert('Please Select Judgement code');
 }
 else
$.ajax({
//type     :'GET',
url        : '/advanced_yii/judgment-citation/citation?id='+citation,
dataType   : 'json',
success    : function(data){
        console.log(data);
        $('.dynamic-rows div').html('');    

         var res = (data.citation).split(";");
         console.log(res.length);
         for(i=0;i<res.length;i++){
            if(res[i])
            {
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="form-group field-judgmentcitation-citation has-success"><label class="control-label" for="judgmentcitation-citation">Citation</label><input type="text" id="judgmentcitation-citation" class="form-control judgmentcitation-citation" name="JudgmentCitation[citation][]" maxlength="50" aria-invalid="false" value="'+res[i]+'"><div class="help-block"></div></div></div></div></div>');
            }
            }
    },
        error: function(xhr, textStatus, errorThrown){
        //alert('No states for this contry');
    }                                                         
    });
//console.log(advocate);
}); 
SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);

?>

