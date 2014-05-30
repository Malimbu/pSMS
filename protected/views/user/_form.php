
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
  	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required. mgafur</p>

	<?php echo $form->errorSummary($model); ?>

<div class="span5">
<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>20)); ?>
</div>
<div class="span5">
<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>50)); ?>
</div>

<div class="span5">
<?php echo $form->textFieldRow($model,'password',array('class'=>'span5','maxlength'=>50)); ?>
</div>
<div class="span5">
<?php echo $form->textFieldRow($model,'password2',array('class'=>'span5','maxlength'=>50)); ?>
</div>

<div class="span5">
<?php echo $form->DropDownListRow($model,'id_pst',Pst::model()->getOption(),array('class'=>'span5','maxlength'=>20)); ?>
</div>
<div class="span5">
<?php echo $form->DropDownListRow($model,'id_level',array(1=>'Admin',7=>'Program Studi'),array('class'=>'span5','maxlength'=>20)); ?>
</div>


<div class="span10">
	<?php if (extension_loaded('gd')): ?>
        		<?php $this->widget('CCaptcha'); ?><br/>
        		<?php //echo CHtml::activeTextField($model,'verifyCode'); ?>
		<?php echo $form->textFieldRow($model,'verifyCode',array('class'=>'span5','maxlength'=>20)); ?>

	<?php endif; ?>
</div>





<?php echo $form->fileFieldRow($model,'avatar',array('class'=>'span5','maxlength'=>20)); ?>


<div class="span10 form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
