<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentOverruledby */

$this->title = 'Create Judgment Overruledby';
$this->params['breadcrumbs'][] = ['label' => 'Judgment Overruledbies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-overruledby-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
