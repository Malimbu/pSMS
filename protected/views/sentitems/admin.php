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
        <img src="/pSMS/images/icon/mail.png" alt="" />
        Pesan Terkirim		
    </h1>
</div>

<?php
$box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Manage Pesan Terkirim',
    'headerIcon' => 'icon-th-list',
    'headerButtons' => array(
        array(
            'class' => 'bootstrap.widgets.TbButtonGroup',
            //'type' => 'primary',
            'buttons' => array(
                //array('label'=>'Tambah', 'icon'=>'icon-plus','url'=>array('create')),
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
    'id' => 'sentitems-grid',
    'type' => 'bordered striped condensed hover',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'SendingDateTime',
            'header' => 'Tanggal Kirim',
            'value' => '$data->SendingDateTime',
            'htmlOptions' => array('style' => 'width:130px; text-align: center;'),
        ),
        array(
            'name' => 'member_search',
            'header' => 'Penerima',
            'value' => 'isset($data->members->name)?$data->members->name :$data->DestinationNumber',
            'htmlOptions' => array('style' => 'width:180px; text-align: left;'),
        ),
        'TextDecoded',
        //'Status',
        
        array(
            'name' => 'Status',
            //'header' => 'Penerima',
            'filter'=>array(1=>'Terkirim',2=>'Gagal'),
            'value' => '$data->Status',
            'htmlOptions' => array('style' => 'width:120px; text-align: center;'),
        ),
        
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'header' => 'Action',
            'template'=>'{delete}',
        ),
         
    ),
));
?>

<?php $this->endWidget(); ?>