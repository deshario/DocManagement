<?php

use yii\helpers\Html;
use app\models\User;
use yii\bootstrap\Modal;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->

        <?php if (Yii::$app->user->isGuest) { ?>

            <?php

            $menuItems = [
                ['label' => 'Menu', 'options' => ['class' => 'header']],
                ['label' => 'เข้าสู่ระบบ', 'icon' => 'sign-in', 'url' => ['site/login']],
            ];

            ?>

        <?php } else { ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo Yii::getAlias('@web') . '/img/man.png'; ?>" class="img-circle"
                         alt="User Image"/>
                </div>
                <div class="pull-left info">

                    <p><?= Yii::$app->user->identity->username ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> ออนไลน์ </a>
                </div>
            </div>

            <?php
            $Maccess = Yii::$app->user->identity->roles;
            if ($Maccess == User::ROLE_ADMIN) {
                $menuItems = [
                    ['label' => '', 'options' => ['class' => 'header']],
                    [
                        'label' => 'โครงการทั้งหมด',
                        'icon' => 'key',
                        'active' => true,
                        'url' => '#',
                        'items' => [
                            ['label' => 'โครงการทั้งหมด', 'icon' => 'arrow-right', 'url' => ['project/index'],],
                            ['label' => 'สร้างโครงการ', 'icon' => 'arrow-right', 'url' => ['project/create'],],
                        ],
                    ],
                    [
                        'label' => 'จัดการข้อมูลเบืองต้น',
                        'icon' => 'key',
                        'active' => true,
                        'url' => '#',
                        'items' => [
                            ['label' => 'หน่วยงาน', 'icon' => 'arrow-right', 'url' => ['organization/index'],],
                            ['label' => 'กลยุทธ์', 'icon' => 'arrow-right', 'url' => ['strategy/index'],],
                            ['label' => 'เปาประสงค์', 'icon' => 'arrow-right', 'url' => ['goal/index'],],
                            ['label' => 'ยุทธศาสตร์', 'icon' => 'arrow-right', 'url' => ['strategic/index'],],
                            ['label' => 'ตัวชีวัด', 'icon' => 'arrow-right', 'url' => ['indicator/index'],],
                            ['label' => 'องค์ประกอบ', 'icon' => 'arrow-right', 'url' => ['element/index'],],
                            ['label' => 'ผลผลิต', 'icon' => 'arrow-right', 'url' => ['product/index'],],
                            ['label' => 'ผู้รับผิดชอบโครงการ', 'icon' => 'arrow-right', 'url' => ['responsibler/index'],],
                        ],
                    ],
                    ['label' => 'ออกจากระบบ', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post"><i class="fa fa-sign-out"></i>{label}</a>'],
                ];
            }else{
                $menuItems = [
                    ['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'โครงการของฉัน', 'icon' => 'users', 'url' => ['project/mine'],],
                    ['label' => 'ออกจากระบบ', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post"><i class="fa fa-sign-out"></i>{label}</a>'],
                ];
            }
            ?>

        <?php } ?>




        <?= dmstr\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
            'items' => $menuItems
        ]); ?>

    </section>

</aside>
