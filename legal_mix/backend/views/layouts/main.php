<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use mdm\admin\components\MenuHelper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php 
if(Yii::$app->controller->id == 'judgment-mast' && Yii::$app->controller->action->id ='create')
{ $sidebar = 'sidebar-collapse'; } else { $sidebar = ''; }

?>
<body class="hold-transition skin-blue <?= $sidebar ?> ">
<?php $this->beginBody() ?>

<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="/cjadmin/site/index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>DMIN</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= Yii::getAlias('@web'); ?>/../backend/web/theme/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin User</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= Yii::getAlias('@web'); ?>/../backend/web/theme/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Admin
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/cjadmin/site/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
   <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= Yii::getAlias('@web'); ?>/../backend/web/theme/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
     <!--  <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>     -->
            <div class="nav-bar-class-check" style="display:none;" >       
            <?php

    NavBar::begin([
        //'brandLabel' => 'My Company',
        //'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'sidebar-menu'   ,
        ],
    ]);


    $menuItems = [
        ['label' => 'Dashboard', 'url' => ['/site/index']],
    ];

    $menuItems=array_merge($menuItems,MenuHelper::getAssignedMenu(Yii::$app->user->id));
     

/*    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }*/
    echo Nav::widget([
    'options' => ['class' => 'treeview'],
        'items' => $menuItems,
    ]);


    NavBar::end();

    ?>
    </div>
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
                          
            <li class="active"><a href="/cjadmin/site/index"><i class="fa fa-circle-o"></i> Dashboard</a></li>                        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Content</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/cjadmin/pages"><i class="fa fa-circle-o"></i>CMS Pages</a></li>
            <li><a href="/cjadmin/categories"><i class="fa fa-circle-o"></i>Categories</a></li>
            <li><a href="/cjadmin/bareact-catg"><i class="fa fa-circle-o"></i> Bare Act Category</a></li>
            <li><a href="/cjadmin/bareact-mast"><i class="fa fa-circle-o"></i> Bare Act Master</a></li>
            <li><a href="/cjadmin/bareact-detail"><i class="fa fa-circle-o"></i> Bare Act Detail</a></li>                          
          <li><a href="/cjadmin/city-mast" ><i class="fa fa-circle-o"></i>City</a></li>
		<li><a href="/cjadmin/country-mast" ><i class="fa fa-circle-o"></i>Country</a></li>
		<li><a href="/cjadmin/court-mast" ><i class="fa fa-circle-o"></i>Court</a></li>
		<li><a href="/cjadmin/journal-mast" ><i class="fa fa-circle-o"></i>Journal</a></li>
		<li><a href="/cjadmin/state-mast" ><i class="fa fa-circle-o"></i>State</a></li></ul></li>
          
 
         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Judgments</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="/cjadmin/jcatg-mast" ><i class="fa fa-circle-o"></i>Judgment Category</a></li>
		<li><a href="/cjadmin/jsub-catg-mast" ><i class="fa fa-circle-o"></i>Judgment Subcategory </a></li>
		<li><a href="/cjadmin/judgment-bench-type" ><i class="fa fa-circle-o"></i>Bench Master </a></li>
		<li><a href="/cjadmin/judgment-disposition" ><i class="fa fa-circle-o"></i>Disposition Master </a></li>
		<li><a href="/cjadmin/judgment-jurisdiction" ><i class="fa fa-circle-o"></i>Jurisdiction Master </a></li>
		<!-- <li><a href="/cjadmin/judgment-act" ><i class="fa fa-circle-o"></i>Acts Referred</a></li>
		<li><a href="/cjadmin/judgment-advocate" ><i class="fa fa-circle-o"></i>Judgment Advocates</a></li>
		<li><a href="/cjadmin/judgment-citation" ><i class="fa fa-circle-o"></i>Judgment Citations</a></li>
		<li><a href="/cjadmin/judgment-ext-remark" ><i class="fa fa-circle-o"></i>Judgment Ext Reference</a></li>
		<li><a href="/cjadmin/judgment-judge" ><i class="fa fa-circle-o"></i>Judgment Coram</a></li>
		<li><a href="/cjadmin/judgment-parties" ><i class="fa fa-circle-o"></i>Appellant – Respondent</a></li> -->
		<li><a href="/cjadmin/judgment-mast" ><i class="fa fa-circle-o"></i>Judgments</a></li></ul>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Finances</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="/cjadmin/finances/accounting-summary" ><i class="fa fa-circle-o"></i>Accounting Summary</a></li>
			<li><a href="/cjadmin/finances/demo-accounts" ><i class="fa fa-circle-o"></i>Demo Accounts</a></li>
			<li><a href="/cjadmin/finances/expired-accounts" ><i class="fa fa-circle-o"></i>Expired Accounts</a></li>
			<li><a href="/cjadmin/finances/user-invoices" ><i class="fa fa-circle-o"></i>User Invoices</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="/cjadmin/admin/user/signup" ><i class="fa fa-circle-o"></i>Add User</a></li>
			<li><a href="/cjadmin/admin/user/index" ><i class="fa fa-circle-o"></i>List Users</a></li>
             <li><a href="/cjadmin/admin/assignment/index"><i class="fa fa-circle-o"></i> Assignments</a></li>
            <li><a href="/cjadmin/admin/menu/index"><i class="fa fa-circle-o"></i> Menus</a></li>
            <li><a href="/cjadmin/admin/permission/index"><i class="fa fa-circle-o"></i> Permissions</a></li>
            <li><a href="/cjadmin/admin/role/index"><i class="fa fa-circle-o"></i> Roles</a></li>
            <li><a href="/cjadmin/admin/route/index"><i class="fa fa-circle-o"></i> Routes</a></li>
            <li><a href="/cjadmin/admin/rule/index"><i class="fa fa-circle-o"></i> Rules</a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Articles</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/articles/index" ><i class="fa fa-circle-o"></i>Add Articles</a></li>
     
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>News</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/news/index" ><i class="fa fa-circle-o"></i>Add News</a></li>
     
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Faq</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/faq/index" ><i class="fa fa-circle-o"></i>Add Faq</a></li>
     
          </ul>
        </li>

         <li class="treeview">
          <a href="/site/search">
            <i class="fa fa-files-o"></i>
            <span>Search</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
         
        </li>


  
      </ul>

      <!-- </ul> -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
             <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>      
    <!-- /.content -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  
    <strong>Copyright &copy; Court Judgments.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<style type="text/css">
  .navbar-default { background-color: #222d32 !important; border-color: #222d32 !important; }
  dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 200px;
    padding: 10px 0;
    margin: 2px 0 0;
    font-size: 15px;
    text-align: left;
    list-style: none;
    background-color: #367fa9 !important;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
}
</style>
<script type="text/javascript">
  
</script>
   
<?php
  $customScript = <<< SCRIPT
    $(".nav-bar-class-check").find('.container').removeAttr('class');
SCRIPT;
  $this->registerJs($customScript, \yii\web\View::POS_READY);
 ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
