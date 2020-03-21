<?php
/* @var $this yii\web\View*/

use yii\helpers\Html;
use yii\helpers\Url;
//$this->title = $model->faq_title;

\yii\web\YiiAsset::register($this);

?>
<style type="text/css">
.search-result-title-new {
    
    color: #185886;
    font-size: 17px;
}
</style>
<div class="template">
    <div class ="body-content">
       
           
        
        <div class="col-md-12">
            <div class="row">
            
                <!--SideBar Menu-->
                <div class="col-md-3 border-green side-menu">
                    <div class="row side-menu-content">
                        <div class="box box-v2">   
                            <div class="box-body">
                                <div id="wrapper">
                                   
                                       
                                        <?=Html::img('@web/images/advertise/3 Post.png')?>
                                   
                                </div>        
                                 
                            </div>
                            <div class="box-body">
                                <div id="wrapper">
                                    
                                       
                                        <?=Html::img('@web/images/advertise/8 Post.png')?>
                                    
                                </div>        
                                 
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-9 border-green">
                   <?php foreach($models as $model){?>
                    <div class="row">
                    <!-- Search Results-->
                   
                        <div class="box box-v3">
                            <div class="box-header with-border box-header-custom">
                                <div class="row">
                                    <div class="col-md-8">
                                        <span class=" search-result-title-new">
                                            <?=  $model['faq_title']; ?>
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body search-results-body">
                                <div class="search-result-content">
                                    <p>
                                       <?=  $model['faq_desc']; ?>
                                    <p>
                                </div>
                                
                            </div>
                        </div>
                   
                    
                   
                </div><!--end of row--->
                 <?php } ?>
                </div>
            </div>
        </div>
        
    </div>
</div>

