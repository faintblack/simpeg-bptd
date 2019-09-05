<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Golongan';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--
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
-->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title"><?= $this->title; ?></h4>
        
        <!-- Tombol tambah golongan -->
        <p>
            <?= Html::a('Tambah Golongan', ['create'], ['class' => 'btn btn-success']) ?>  
        </p>
         
        <!-- Tabel -->
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Tabel Data Golongan</b></h4>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Golongan</th>
                        <th>Pangkat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
                        foreach ($dataProvider->models as $key => $v) {
                            $romawi = "";
                            $kelas = substr($v['golongan'], -1);
                            $number = substr($v['golongan'], 0, -1);
                            while ($number != 0) {
                                foreach ($map as $roman => $nilai) {
                                    if ($number >= $nilai) {
                                        $number -= $nilai;
                                        $romawi .= $roman;
                                    }
                                }
                            }
                            
                    ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= "{$romawi}/{$kelas}" ?></td> <!-- $romawi.'/'.$kelas -->
                        <td><?= $v['pangkat'] ?></td>
                        <td class="text-center">
                            <a href="<?= Url::to(); ?>" class=" ti-info "></a>
                            <a href="" class=" ti-pencil" data-toggle="modal" data-target="#Modal"></a>
                            <a href="" class=" ti-trash" data-toggle="modal" data-target="#Modal1"></a>
                        </td>
                    </tr> 
                    <?php
                        }
                    ?>
                                   
                </tbody>
            </table>
        </div>
        
    </div>
</div>