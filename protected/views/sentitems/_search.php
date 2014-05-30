<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'UpdatedInDB',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'InsertIntoDB',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SendingDateTime',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DeliveryDateTime',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'Text',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'DestinationNumber',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'Coding',array('class'=>'span5','maxlength'=>22)); ?>

		<?php echo $form->textAreaRow($model,'UDH',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'SMSCNumber',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'Class',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'TextDecoded',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'ID',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'SenderID',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'SequencePosition',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>17)); ?>

		<?php echo $form->textFieldRow($model,'StatusError',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TPMR',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'RelativeValidity',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'CreatorID',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
