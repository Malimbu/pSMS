<?php
$this->breadcrumbs=array(
	'Manage',
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Manage User',
'headerIcon' => 'icon-th-list',
'headerButtons' => array(
	array(
	'class' => 'bootstrap.widgets.TbButtonGroup',
	//'type' => 'primary',
	'buttons'=>array(
		array('label'=>'Tambah', 'icon'=>'icon-plus','url'=>array('create'))
		),
	),
)
));?>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'user-grid',
	'type'=>'bordered striped condensed hover',	
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'id_level',
		'email',
		'joinDate',
		/*
		'id_level',
		'avatar',
		'isActive',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>


<?php $this->endWidget();?>