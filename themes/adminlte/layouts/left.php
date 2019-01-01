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
                    <?php
                    $id = Yii::$app->user->identity->id;
                    $model = \app\models\Managers::find()->where('id = ' . $id)->one();
                    if($model->picture != null){
                        $imgdir = Yii::getAlias('@web').'/uploads/avatars/';
                        $img = $imgdir.$model->picture;
                    }else{
                        $imgdir = Yii::getAlias('@web').'/img/';
                        $img = $imgdir.'man.png';
                    }
                    ?>
                    <img src="<?php echo $img; ?>" class="img-circle" alt="User Image"/>

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
                        'icon' => 'book',
                        'active' => true,
                        'url' => '#',
                        'items' => [
                            ['label' => 'โครงการทั้งหมด', 'icon' => 'book', 'url' => ['project/index'],],
                            ['label' => 'สร้างโครงการ', 'icon' => 'plus', 'url' => ['project/create'],],
                        ],
                    ],
                    [
                        'label' => 'จัดการข้อมูลเบื้องต้น',
                        'icon' => 'cog',
                        'active' => true,
                        'url' => '#',
                        'items' => [
                            ['label' => 'หน่วยงาน', 'icon' => 'arrow-right', 'url' => ['organization/index'],],
                            ['label' => 'ยุทธศาสตร์', 'icon' => 'arrow-right', 'url' => ['strategic/index'],],
                            ['label' => 'เป้าประสงค์', 'icon' => 'arrow-right', 'url' => ['goal/index'],],
                            ['label' => 'กลยุทธ์', 'icon' => 'arrow-right', 'url' => ['strategy/index'],],
                            ['label' => 'ตัวชี้วัด', 'icon' => 'arrow-right', 'url' => ['indicator/index'],],
                            ['label' => 'องค์ประกอบ', 'icon' => 'arrow-right', 'url' => ['element/index'],],
                            ['label' => 'ผลผลิต', 'icon' => 'arrow-right', 'url' => ['product/index'],],
                            ['label' => 'แหล่งที่มาของงบประมาณ', 'icon' => 'arrow-right', 'url' => ['budget-type/index'],],

                            ['label' => 'ผู้รับผิดชอบโครงการ', 'icon' => 'arrow-right', 'url' => ['responsibler/index'],],
                        ],
                    ],

                    [
                        'label' => 'ผู้ใช้งาน',
                        'icon' => 'users',
                        'url' => '#',
                        'active' => true,
                        'items' => [
                            ['label' => 'สร้างผู้ใช้งาน', 'icon' => 'plus', 'url' => ['managers/create'],],
                            ['label' => 'จัดการผู้ใช้งาน', 'icon' => 'edit', 'url' => ['managers/manage'] ],
                        ],
                    ],
                    ['label' => 'ออกจากระบบ', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post"><i class="fa fa-sign-out"></i>{label}</a>'],
                ];
            }else{
                $menuItems = [
                    ['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'โครงการของฉัน', 'icon' => 'book', 'url' => ['project/mine'],],
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
