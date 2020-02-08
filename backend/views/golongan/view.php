<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Golongan */

$this->title = $model->kode_golongan;
$this->params['breadcrumbs'][] = ['label' => 'Golongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Detail Data Golongan <?= $this->title; ?></h4>
                 
        <!-- Tabel -->
        <div class="card-box responsive">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id_golongan], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id_golongan], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id_golongan',
                    'kode_golongan',
                    'pangkat',
                ],
            ]) ?>
        </div>
    </div>
</div>
