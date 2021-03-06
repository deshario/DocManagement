<?php
use dmstr\widgets\Alert;
use yii\widgets\Breadcrumbs;

?>

<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) {?>
            <h1><?=$this->blocks['content-header']?></h1>
        <?php } else {?>
            <h1>
                <?php
if ($this->title !== null) {
    //echo \yii\helpers\Html::encode($this->title);
} else {
    echo \yii\helpers\Inflector::camel2words(
        \yii\helpers\Inflector::id2camel($this->context->module->id)
    );
    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
}?>
            </h1>
        <?php }?>

        <div class="row" style="margin-bottom:-25px">
            <div class="container-fluid">
                    <?=Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])?>
            </div>
        </div>

    </section>

    <section class="content">
        <?=Alert::widget()?>
        <?=$content?>
    </section>
</div>

<footer class="main-footer">
   <div class="pull-right hidden-xs">
      <a href="https://github.com/deshario/DocManagement" target="_blank">
          <img style="margin-top:-5px; height: 30px; width: 30px;" src="<?php echo Yii::getAlias('@web').'/img/opensource.png'; ?>"/>
          <b>&nbsp;Version</b> 1.0
      </a>
   </div>
   <strong>Copyright &copy; 2018 <a>
   Rajamangala University of Technology Lanna Nan</a></strong>

</footer>