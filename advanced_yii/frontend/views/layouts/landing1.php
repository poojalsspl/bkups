<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
/*use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;*/
use yii\widgets\Breadcrumbs;
use frontend\assets\Landing1AppAsset;
use common\widgets\Alert;

Landing1AppAsset::register($this);
//dmstr\web\AdminLteAsset::register($this);

//$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php $this->head() ?>
</head>
<body>
  <?php $this->beginBody() ?>
  <header id="header">
    <nav class="navbar navbar-fixed-top" role="banner">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
          <a class="navbar-brand" href="index.html"> <?=Html::img('@web/images/LawHub_Logo.png')?></a>
        </div>
        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#header">Home</a></li>
            <li><a href="#feature">Feature</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#pricing">Price & Plan</a></li>
            <li><a href="#our-team">Our Team</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
      <!--/.container-->
    </nav>
    <!--/nav-->
  </header>
  <!--/header-->

<?= $content ?>

 
  <footer>

    <div class="social-icon">
      <div class="container">
        <div class="col-md-6 col-md-offset-3">
          <ul class="social-network">
            <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
            <li><a href="#" class="dribbble tool-tip" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
            <li><a href="#" class="pinterest tool-tip" title="Pinterest"><i class="fa fa-pinterest-square"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center">
      <div class="copyright">
        Course Partner <a href="http://www.pioneerinstitute.net/" target="_blank"> &nbsp;Pioneer Institute of Professional Studies</a>
        <div class="credits">
      
         Hosting Partner <a href="https://scorpioinformatics.com/" target="_blank">  &nbsp;Scorpio Informatics</a>
        </div>
      </div>
    </div>
  </footer>
  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

