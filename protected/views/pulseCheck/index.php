<?php
/* @var $this PulseCheckController */

$this->breadcrumbs=array(
	'Pulse Check',
);
?>

<div class="page-header">
	<h1>
		<img src="/lazis/images/icon/cash.png" alt="" />
		Check Pulsa
	</h1>
</div>


<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Pesan Massal',
'headerIcon' => 'icon-th-list',
));?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'journal-header-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

		<p class="help-block">Fields with <span class="required">*</span> are required.</p>

		 <?php echo $form->dropDownListRow($model, 'service_id', array(1=>'Cek Pulsa',2=>'Cek Bonus',3=>'Cek Transaksi Terakhir',4=>'Matikan Service',5=>'Jalankan Service'),array('class'=>'span8')); ?> 
		 <?php echo $form->textAreaRow($model, 'message', array('class'=>'span8', 'rows'=>5,'id'=>'message','readOnly'=>'readOnly')); ?> 

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Cek Pulsa',
			'icon'=>'icon-envelope',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<?php $this->endWidget();?>

