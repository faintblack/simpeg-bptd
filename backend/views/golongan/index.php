<?php

use backend\models\Golongan;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Golongan';
$this->params['breadcrumbs'][] = $this->title;

if (isset($_POST['id_edit'])) {
    //print_r($_POST['id_edit']);
   // $a = ['id_golongan' => $_POST['id_edit']];

    echo json_encode($_POST['id_edit']);
    //die();
}
//print_r($_POST['id_edit']);exit();

?>
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title"><?= $this->title; ?></h4>
        
        <!-- Tombol tambah golongan -->
        <p>
            <a onclick="addLink('<?= Url::to(['create']) ?>')" href="" class="btn btn-success" data-toggle="modal" data-target="#modal-golongan" >Tambah Golongan</a>
        </p>
         
        <!-- Card Box -->
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Tabel Data Golongan </b></h4>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 50px">No.</th>
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
                            $kelas = substr($v['kode_golongan'], -1);
                            $number = substr($v['kode_golongan'], 0, -1);
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
                            <a href="<?= Url::to(['view', 'id' => $v->id_golongan]); ?>" class=" ti-info "></a>
                            <a onclick="editLink('<?= Url::to(['update','id' => $v->id_golongan]) ?>')" href="" class="ti-pencil modalEdit" data-toggle="modal" data-target="#modal-golongan" data-id="<?= $v['id_golongan'] ?>"></a>
                            <a onclick="deleteLink('<?= Url::to(['delete','id' => $v->id_golongan]) ?>')" href="" class="ti-trash" data-toggle="modal" data-target="#custom-width-modal"></a>
                        </td>
                    </tr> 
                    <?php
                        }
                    ?>
                                   
                </tbody>
            </table>
            <!-- Modal Hapus -->
            <?= $this->render('../additional/modal-delete'); ?>            
            <!-- Modal Tambah & Edit -->
            <?php
            $golongan_model = new Golongan();
            echo $this->render('modal',['model' => $golongan_model]);
            ?>
        </div>        
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.modalEdit').on('click', function(){
            const id = $(this).data('id');            
            $.ajax({
                url : "<?= Url::to(['get-json-data']) ?>",
                data : {id_golongan : id},
                method : 'POST',
                dataType : 'JSON',
                success : function(hasil){
                    console.log(hasil);
                    $('#kode_golongan').val(hasil.kode_golongan);
                    $('#pangkat').val(hasil.pangkat);
                }
            });

        });
    });
    function addLink(link){
        $('#golongan-form').attr('action', link);
        $('#modal-title').html('Tambah Data Golongan');
        $('#kode_golongan').val('');
        $('#pangkat').val('');
    }
    function editLink(link){
        $('#golongan-form').attr('action', link);
        $('#modal-title').html('Edit Data Golongan');
    }    
</script>