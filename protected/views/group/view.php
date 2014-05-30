<?php
$this->breadcrumbs=array(
	'Manage'=>array('admin'),
	$model->id,
);
?>

<?php
$box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'View Groups',
'headerIcon' => 'icon-eye-open',
'headerButtons' => array(
array(
	'class' => 'bootstrap.widgets.TbButtonGroup',
	'buttons'=>array(
			array('label'=>'Tambah','icon'=>'icon-plus','url'=>array('create')),
			array('label'=>'Update','icon'=>'icon-pencil','url'=>array('update','id'=>$model->id)),
			//array('label'=>'Hapus','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage','icon'=>'icon-list','url'=>array('admin')),
		),
	),
)
));?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'active',
),
)); ?>

<?php $this->endWidget();?>