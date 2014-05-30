<?php
$this->breadcrumbs = array(
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('journal-header-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header">
    <h1>
        <img src="/pSMS/images/icon/inbox.png" alt="" />
        Pesan Masuk		
    </h1>
</div>

<?php
$box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Manage Pesan Masuk',
    'headerIcon' => 'icon-th-list',
    'headerButtons' => array(
        array(
            'class' => 'bootstrap.widgets.TbButtonGroup',
            //'type' => 'primary',
            'buttons' => array(
                //array('label' => 'Tambah', 'icon' => 'icon-plus', 'url' => array('create')),
                //array('label' => 'Cari', 'icon' => 'icon-search', 'url' => '#', 'htmlOptions' => array('class' => 'search-button btn'))
            ),
        ),
    )
        ));
?>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'inbox-grid',
    'type' => 'bordered striped condensed hover',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'ID',
        //'SenderNumber',
		//'ReceivingDateTime',
        array(
            'name' => 'ReceivingDateTime',
			'header'=>'Tanggal Terima',
            'value' => '$data->ReceivingDateTime',
            'htmlOptions' => array('style' => 'width:130px; text-align: center;'),
        ),		
        array(
            'name' => 'SenderNumber',
            'header' => 'Penerima',				
			'value'=>'isset(Member::model()->findByAttributes(array("phone_number"=>"0".substr(rtrim($data->SenderNumber),3)))->name)?Member::model()->findByAttributes(array("phone_number"=>"0".substr(rtrim($data->SenderNumber),3)))->name:$data->SenderNumber',				
			//'value'=>'Member::model()->findByAttributes(array("phone_number"=>"0".substr(rtrim($data->SenderNumber),3)))->name',
            'htmlOptions' => array('style' => 'width:200px; text-align: left;'),
            
            //Member::model()->findByAttributes(array('phone_number'=>$data->SenderNumber))
        ),
        'TextDecoded',
        /*
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => 'Action',
            'template'=>'{view}',
        ),
         */
    ),
));
?>

<?php $this->endWidget(); ?>