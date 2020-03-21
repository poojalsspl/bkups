<?php
use sjaakp\gcharts\ColumnChart;


?>

<?= ColumnChart::widget([
'height' => '400px',
'dataProvider' => $dataProvider,
'columns' => [
    'state_name:string',  // first column: domain
    'tot',          // second column: data
    [               // third column: tooltip
        'value' => function($model, $a, $i, $w) {
            return "$model->tot";
        },
        'type' => 'string',
        'role' => 'tooltip',
    ],
],
'options' => [
    'title' => ' Law Colleges State Wise',

],
]) ?>