<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\JudgmentRefSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Refs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-ref-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Judgment Ref', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'judgment_code',
            'judgment_source_code',
            'judgment_code_ref',
            'judgment_source_code_ref',
            // 'judgment_title_ref',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
