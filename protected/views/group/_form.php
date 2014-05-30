<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'group-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->DropDownListRow($model,'active',array('Y'=>'Aktif','N'=>'Non Aktif'),array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
