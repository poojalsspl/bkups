<?php 
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PlanMaster;
?>
<script type="text/javascript">

      function printChecked(checkboxElem,price){
        var sum = 0;
        var total= 0;

       // var items=document.getElementsByName('plan');
        var total=document.getElementById('total').value;
       
        if (checkboxElem.checked) {
            sum = Number(total) + Number(price);
        } else {
            sum = Number(total) - Number(price);
        }

        //alert(sum);
        document.getElementById('total').value = sum;
      }  
     
      
      function calculatetotal(){
         var sum = 0;
         var total= 0;
         var duration=document.getElementById('duration').value;
         //alert(duration);
         var total=document.getElementById('total').value;
        if(duration){
          sum = Number(total) * Number(duration); 
          document.getElementById("ftotal").value =sum;
        }
      }   
       function Validate()
       {
            var e = document.getElementById("duration");
            var strUser = e.options[e.selectedIndex].value;
            var strUser1 = e.options[e.selectedIndex].text;
             if(strUser=="")
              {
                    alert("Please select duration");
                    return false;
              }
         }
</script>
<div style="margin-left: 10%;">
<div class="col-lg-8" >
<div class="planform" style="margin-top: 2%;margin-bottom: 10%">
<?php 
   $authItem = ArrayHelper::map($authItems,'plan','price'); 
  // $price = ArrayHelper::map($authItems,'price','price');
   //echo "<pre>";print_r($authItem) ; exit;
  ?>
  <div class="container-fluid">
  <h1>Select your plan</h1>
  <?php $form = ActiveForm::begin();
    $count = count($authItem);
    foreach ($authItem as $key => $value) {?>
     <div class="row">
     <div class="col-sm-8">
      <input type="checkbox" name="plan[]" onchange="printChecked(this,<?php echo $value; ?>)" id="checkbox" value="<?php echo $key; ?>"> <?php echo $key; ?>
     </div>
     <div class="col-sm-2">
     <input type="text"  name="price[]" value="<?php echo $value; ?>" readonly>
     </div>
      </div>
     <?php }
     ?> 
     <div class="row">
     <div class="col-sm-8">
     <label>Total</label>
     </div>
     <div class="col-sm-2">
     <input type="text" id="total" name="total" value="0" readonly>
     </div>
     </div>
     <div class="row">
     <div class="col-sm-8">
        <label>Duration</label>
      </div>  
      <div class="col-sm-2">
      <select name="duration" id="duration" onchange="calculatetotal()">
        <option value="">Select Tenure</option>
        <option value="1">1 Month</option>
        <option value="2">2 Months</option>
        <option value="3">3 Months</option>
        <option value="4">4 Months</option>
      </select> 
      </div>
       </div>
     <div class="row">
     <div class="col-sm-8">
     <label>Final Total</label>
     </div>
     <div class="col-sm-4">
     <input type="text" id="ftotal"  name="ftotal" value="" readonly>

     </div>
     <div class="col-sm-5">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
     </div>
       
       
        
       
    <?php  ActiveForm::end(); ?>
</div><!-- planform -->
</div>
</div>
 
    

</div>

   