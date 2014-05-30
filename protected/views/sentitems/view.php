<?php
$this->breadcrumbs=array(
	'Manage'=>array('admin'),
	$model->ID,
);
?>

<?php
$box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'View Pesan Terkirim',
'headerIcon' => 'icon-eye-open',
'headerButtons' => array(
array(
	'class' => 'bootstrap.widgets.TbButtonGroup',
	'buttons'=>array(
			array('label'=>'Tambah','icon'=>'icon-plus','url'=>array('create')),
			array('label'=>'Update','icon'=>'icon-pencil','url'=>array('update','id'=>$model->ID)),
			//array('label'=>'Hapus','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage','icon'=>'icon-list','url'=>array('admin')),
		),
	),
)
));?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'UpdatedInDB',
		'InsertIntoDB',
		'SendingDateTime',
		'DeliveryDateTime',
		'Text',
		'DestinationNumber',
		'Coding',
		'UDH',
		'SMSCNumber',
		'Class',
		'TextDecoded',
		'ID',
		'SenderID',
		'SequencePosition',
		'Status',
		'StatusError',
		'TPMR',
		'RelativeValidity',
		'CreatorID',
),
)); ?>

<?php $this->endWidget();?>