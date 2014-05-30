<?php
$this->breadcrumbs=array(
	'Manage'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Update Kurikulum',
'headerIcon' => 'icon-pencil',
'headerButtons' => array(
array(
	'class' => 'bootstrap.widgets.TbButtonGroup',
	'buttons'=>array(
			array('label'=>'Tambah','icon'=>'icon-plus','url'=>array('create')),
			array('label'=>'View', 'icon'=>'icon-eye-open','url'=>array('view','id'=>$model->id)),
			array('label'=>'Manage','icon'=>'icon-list','url'=>array('admin')),
		),
	),
)
));?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

<?php $this->endWidget();?>