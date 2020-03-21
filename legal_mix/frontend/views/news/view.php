<?php
/* @var $this yii\web\View*/

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = $model->news_title;
\yii\web\YiiAsset::register($this);

?>
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
                                    <div id="sidebar-wrapper">
                                       
                                        <?=Html::img('@web/images/advertise/cjbanner.jpg')?>
                                    </div>
                                </div>        
                                 
                            </div>
                            <div class="box-body">
                                <div id="wrapper">
                                    <div id="sidebar-wrapper">
                                       
                                        <?=Html::img('@web/images/advertise/law_img1.jpg')?>
                                    </div>
                                </div>        
                                 
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-9 border-green">
                    <div class="row">
                    <!-- Search Results-->
                   
                        <div class="box box-v3">
                            <div class="box-header with-border box-header-custom">
                                <div class="row">
                                    <div class="col-md-8 align-left">
                                        <span class=" search-result-title">
                                            <?=  $model->news_title; ?>
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body search-results-body">
                                <div class="search-result-content">
                                    <p>
                                       <?=  $model->news_desc; ?>
                                    <p>
                                </div>
                                
                            </div>
                        </div>
                   
                    
                   
                </div>
                </div>
            </div>
        </div>
        
    </div>
</div>





