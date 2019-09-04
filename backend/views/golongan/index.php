<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Golongans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="golongan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Golongan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{summary}\n{pager}",
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No.'
            ],

            'golongan',
            'pangkat',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Aksi'
            ],
        ],
    ]); ?>
</div>
