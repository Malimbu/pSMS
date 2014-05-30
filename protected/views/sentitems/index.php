<?php
/* @var $this SentitemsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sentitems',
);

$this->menu=array(
	array('label'=>'Create Sentitems', 'url'=>array('create')),
	array('label'=>'Manage Sentitems', 'url'=>array('admin')),
);
?>

<h1>Sentitems</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
