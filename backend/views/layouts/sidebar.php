<?php
use yii\helpers\Url;
?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?= Url::toRoute(['/site']) ?>" class="waves-effect <?php
                        if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id =="index") {
                            echo "active";
                        }
                    ?>">
                        <i class="ti-home"></i>  <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="<?= Url::to(['/golongan']) ?>" class="waves-effect">
                        <i class="ti-home"></i>  <span> Data Golongan </span>
                    </a>
                </li>

                <li>
                    <a href="<?= Url::to(['/pegawai']) ?>" class="waves-effect">
                        <i class="ti-home"></i>  <span> Data Pegawai </span> 
                    </a>
                </li>

                <li>
                    <a href="<?= Url::to(['/pengguna']) ?>" class="waves-effect">
                        <i class="ti-paint-bucket"></i> <span> Data Pengguna </span>  
                    </a>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>