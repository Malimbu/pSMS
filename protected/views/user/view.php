<?php
$this->breadcrumbs=array(
	'Manage'=>array('admin'),
	$model->username,
);

?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'View Pengguna Aplikasi',
'headerIcon' => 'icon-eye-open',
'headerButtons' => array(
array(
	'class' => 'bootstrap.widgets.TbButtonGroup',
	'buttons'=>array(
			array('label'=>'Tambah','icon'=>'icon-plus','url'=>array('create')),
			array('label'=>'Update','icon'=>'icon-pencil','url'=>array('update','id'=>$model->id)),
			//array('label'=>'Hapus','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->transaction_id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage','icon'=>'icon-list','url'=>array('admin')),
		),
	),
)
));?>


<?php $form=$this->beginWidget('CActiveForm', array(
)); ?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'email',
		'joinDate',
		'id_level',
		array(
			'label'=>'Avatar',
			'type'=>'raw',
			'value'=>Chtml::image('a/../avatar/'.$model->avatar,'DORE', array("width"=>100)),
		),
	),
)); ?>
<?php $this->endWidget(); ?>

<?php $this->endWidget();?>