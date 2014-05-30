<?php
/* @var $this MessageController */

$this->breadcrumbs=array(
	'Message'=>array('/message'),
	'Broadcash',
);
?>

<div class="page-header">
	<h1>
		<img src="/pSMS/images/icon/mail.png" alt="" />
		Pesan Massal (Broadcash)
	</h1>
</div>


<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Pesan Massal',
'headerIcon' => 'icon-th-list',
		'headerButtons' => array(
				array(
						'class' => 'bootstrap.widgets.TbButtonGroup',
						//'type' => 'primary',
						'buttons'=>array(
								array('label'=>'Details', 'icon'=>'icon-cog','url'=>array('index'),'htmlOptions'=>array('id'=>'margin','data-toggle' => 'modal','data-target' => '#myModal'))
						),
				),
		)		
));?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'journal-header-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

		<p class="help-block">Fields with <span class="required">*</span> are required.</p>
		 <?php echo $form->DropDownListRow($model, 'status_id',array('y'=>'Aktif','n'=>'Non Aktif','all'=>'Semua'), array('class'=>'span8')); ?>		
		 <?php echo $form->textAreaRow($model, 'message', array('class'=>'span8', 'rows'=>5,'id'=>'message')); ?>		
	
		<div class='margin' style="display: none;">
		 <?php //echo $form->DropDownListRow($model, 'status_id',array('y'=>'Aktif','n'=>'Non Aktif','all'=>'Semua'), array('class'=>'span8')); ?>		
		 <?php echo $form->DropDownListRow($model, 'is_details',array('s'=>'Standar','l'=>'Lengkap',), array('class'=>'span8','hint'=>'* Pengiriman dgn Status Lengkap Akan Memasukkan Nama Pada Pesan')); ?>		
		 <?php echo $form->DropDownListRow($model, 'flag',array('n'=>'Normal','f'=>'Flash',), array('class'=>'span8','hint'=>'* Pengiriman dgn Status Flash, Pesan akan ditampilkan hanya sebagai Info tanpa ')); ?>		

		 
		<div class="control-group">
			<?php echo $form->labelEx($model,'schedule',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php
				$this->widget('ext.timepicker.BJuiDateTimePicker',array(
					'model'=>$model,
					'attribute'=>'schedule',
					'type'=>'datetime', // available parameter is datetime or time
					'language'=>'id', // default to english
					//'themeName'=>'sunny', // jquery ui theme, file is under assets folder
					'options'=>array( 
						'timeFormat'=>'HH:mm',
						'dateFormat'=>'dd-mm-yy',
						'showAnim'=>'fold',
						//'showSecond'=>true,
						//'hourGrid'=>4,
						//'minuteGrid'=>10,
					),
					'htmlOptions'=>array(
						//'class'=>'input-medium'
						'class'=>'span8'
					)
				));
				?>	
			</div>
		</div>
			 
		</div>

		 <div class="info">
		 <?php echo CHtml::label('', 'label',array('id'=>'id_label')) ?>		
		</div>		
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Kirim Pesan',
			'icon'=>'icon-envelope',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
<?php $this->endWidget();?>


<script type="text/javascript" >
	$(function(){
		$('#margin').click(function(){
			$('.margin').toggle('slow');				
		});

		$('#message').keyup(function () {
		    var max = 160;
		    var total=160;
		    var len = $(this).val().length;
		    //if (len >= max) {
		    //    $('#id_label').text(' you have reached the limit');
		    //} else {
		        //var ch = max - len;
		        var ch = len;
		        pages=Math.ceil(len/total);
		        $('#id_label').text(ch + ' / ' + pages);
		    //}
		});
				
					
	});
</script>