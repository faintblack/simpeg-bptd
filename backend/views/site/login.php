<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<?php $form = ActiveForm::begin(['id' => 'login-form', 
    'options' => [
        'class' => 'form-horizontal'
    ]
]); ?>
    <!-- <form class="form-horizontal m-t-20" action="index.html">          -->      
    <div class="form-group ">
        <div class="col-xs-12">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Username'])->label(false) ?>
            <!-- <input class="form-control" type="text" required="" placeholder="Username"> -->
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Password'])->label(false) ?>
            <!-- <input class="form-control" type="password" required="" placeholder="Password"> -->
        </div>
    </div>
    
    <div class="form-group" style="margin-top:20px">
        <div class="col-xs-12" style="padding: 0px;">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block text-uppercase waves-effect waves-light', 'name' => 'login-button']) ?> 
            <!--<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>-->            
        </div>
    </div>

<!-- </form> -->
<?php ActiveForm::end(); ?> 