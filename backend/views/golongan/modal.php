<?php

use yii\widgets\ActiveForm;

?>
<div id="modal-golongan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <!-- #Next buat function khusus untuk edit golongan, worth it or not? -->
            <?php $form = ActiveForm::begin(['id' => 'golongan-form']); ?>
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 id="modal-title" class="modal-title">Data Golongan</h4> 
                </div> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <?= $form->field($model, 'kode_golongan')->textInput([
                                    'maxlength' => true, 
                                    'autofocus' => true,
                                    'placeholder' => 'Contoh : 3a, 4b, 3c, dsb.',
                                    'id' => 'kode_golongan'
                                    ]) ?>
                            </div> 
                        </div>
                    </div> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <?= $form->field($model, 'pangkat')->textInput([
                                    'maxlength' => true, 
                                    'autofocus' => true,
                                    'placeholder' => 'Contoh : Pembina Muda, Penata Muda',
                                    'id' => 'pangkat'
                                    ]) ?>
                            </div> 
                        </div> 
                    </div>
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button> 
                </div>
            <?php ActiveForm::end(); ?>
        </div> 
    </div>
</div>