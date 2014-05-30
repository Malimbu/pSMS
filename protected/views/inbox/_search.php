<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'UpdatedInDB',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ReceivingDateTime',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'Text',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'SenderNumber',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'Coding',array('class'=>'span5','maxlength'=>22)); ?>

		<?php echo $form->textAreaRow($model,'UDH',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'SMSCNumber',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'Class',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'TextDecoded',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'ID',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textAreaRow($model,'RecipientID',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'Processed',array('class'=>'span5','maxlength'=>5)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
