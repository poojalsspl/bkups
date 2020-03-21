<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CollegeMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'College Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create College Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'college_code',
            'college_name',
            //'total_students',
            //'city_code',
            'city_name',
            //'state_code',
            'state_name',
            //'country_code',
            //'country_name',
            //'prospectus',
            //'univ_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
