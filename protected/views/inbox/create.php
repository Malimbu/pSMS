<?php
$this->breadcrumbs=array(
	'Manage'=>array('admin'),
	'Tambah',
);

?>

<?php
$box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Tambah Pesan Masuk',
'headerIcon' => 'icon-plus',
'headerButtons' => array(
array(
	'class' => 'bootstrap.widgets.TbButtonGroup',
	//'type' => 'primary',
	'buttons'=>array(
		array('label'=>'manage', 'icon'=>'icon-list', 'url'=>array('admin'))
		),
	),
)
))?>;

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>;

<?php $this->endWidget();?>