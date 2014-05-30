<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'customer-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>45)); ?>
	<?php echo $form->textFieldRow($model,'phone_number',array('class'=>'span5','maxlength'=>15)); ?>
	<?php echo $form->textAreaRow($model,'address',array('class'=>'span5', 'rows'=>2,'maxlength'=>45)); ?>

	
	<?php /* echo $form->select2Row($model, 'city_id', array(
		'asDropDownList' => true, 
		'data' => RefCity::model()->getOptions(),    
		'options' => array(
			'width' => '49%',
			'minimumResultsForSearch'=>2,
		), 
	));
	*/
	?>
	
	<?php echo $form->select2Row($model, 'group_id', array(
		'asDropDownList' => true, 
		'data' => Group::model()->getOptions(),
		'val'=>'Dosen',
		'multiple' => 'multiple',			
		'options' => array(
			'width' => '49%',
			'minimumResultsForSearch'=>2,
		),
		
	));?>
	
	
	<?php echo $form->DropDownListRow($model,'status',array('y'=>'Aktif','n'=>'Non Aktif'),array('class'=>'span5','maxlength'=>1)); ?>
	<?php echo $form->textAreaRow($model,'note',array('class'=>'span5','rows'=>3, 'maxlength'=>100)); ?>
	
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
