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
                <a id="modal-delete-button" data-method="post" type="button" class="btn btn-danger waves-effect waves-light">Hapus</a>
            </div>
        </div>
    </div>
</div>