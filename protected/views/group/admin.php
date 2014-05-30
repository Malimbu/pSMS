<?php
$this->breadcrumbs=array(
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('journal-header-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<div class="page-header">
	<h1>
		<img src="/pSMS/images/icon/user_group.png" alt="" />
		Groups		
	</h1>
</div>

<?php
$box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Manage Groups',
'headerIcon' => 'icon-th-list',
'headerButtons' => array(
	array(
	'class' => 'bootstrap.widgets.TbButtonGroup',
	//'type' => 'primary',
	'buttons'=>array(
		array('label'=>'Tambah', 'icon'=>'icon-plus','url'=>array('create')),
		array('label'=>'Cari', 'icon'=>'icon-search','url'=>'#','htmlOptions'=> array('class'=>'search-button btn'))		
		),
	),
)
));?>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'group-grid',
'type'=>'bordered striped hover condensed', 
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'name',
		'active',
		array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'header'=>'Action',
		),
	),
)); ?>

<?php $this->endWidget();?>