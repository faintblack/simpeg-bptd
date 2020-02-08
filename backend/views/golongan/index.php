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
            <?= Html::a('Tambah Golongan', ['create'], ['class' => 'btn btn-success']) ?>  
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
                            <a onclick="editLink('<?= Url::to(['update2','id' => $v->id_golongan]) ?>')" href="" class="ti-pencil modalEdit" data-toggle="modal" data-target="#modal-edit" data-id="<?= $v['id_golongan'] ?>"></a>
                            <a onclick="deleteLink('<?= Url::to(['delete','id' => $v->id_golongan]) ?>')" href="" class="ti-trash" data-toggle="modal" data-target="#custom-width-modal"></a>
                        </td>
                    </tr> 
                    <?php
                        }
                    ?>
                                   
                </tbody>
            </table>
            <!-- Modal Hapus -->
            <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" style="width:35%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="custom-width-modalLabel">Hapus <?= $this->title ?></h4>
                        </div>
                        <div class="modal-body">
                            <h5>Apa anda yakin ingin menghapus <?= $this->title ?> ini ? </h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                            <a id="modal-delete-button" data-method="post" type="button" class="btn btn-primary waves-effect waves-light">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Edit -->
            <div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog"> 
                    <div class="modal-content">
                        <!-- #Next buat function khusus untuk edit golongan, worth it or not? -->
                        <form id="form-edit-golongan" method="post" action="">
                            <div class="modal-header"> 
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                <h4 class="modal-title">Edit <?= $this->title ?></h4> 
                            </div> 
                            <div class="modal-body">
                                <div class="row"> 
                                    <div class="col-md-12"> 
                                        <div class="form-group"> 
                                            <label for="field-1" class="control-label">Kode Golongan</label> 
                                            <input type="text" class="form-control" id="kode_golongan-edit" name="kode_golongan" placeholder="Contoh : 3a" autofocus>
                                        </div> 
                                    </div>
                                </div> 
                                <div class="row"> 
                                    <div class="col-md-12"> 
                                        <div class="form-group"> 
                                            <label for="field-3" class="control-label">Pangkat</label> 
                                            <input type="text" class="form-control" id="pangkat-edit" name="pangkat" placeholder="Contoh : Penata Muda"> 
                                        </div> 
                                    </div> 
                                </div>
                            </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button> 
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <?php
        if (isset($_POST['id_edit'])) {
            //print_r($_POST['id_edit']);exit();
            $model = Golongan::findOne(['id_golongan' => $_POST['id_edit']]);
        }
        ?>
        
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
                    $('#kode_golongan-edit').val(hasil.kode_golongan);
                    $('#pangkat-edit').val(hasil.pangkat);
                    /*
                    $.ajax({
                        url : '<?= Url::to(['index']) ?>',
                        method : 'POST',
                        //dataType : 'json',
                        data : {id_edit : id},
                        success : function(re){
                            console.log(re);
                        }
                    });*/
                }
            });

        });  
    });
    function deleteLink(link){
        $('#modal-delete-button').attr('href', link);
    }
    function editLink(link){
        $('#form-edit-golongan').attr('action', link);
    }
    
</script>