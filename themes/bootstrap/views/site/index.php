<?php 
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/css/styles.css');

?>
<?php
	$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'Patikala SMS',
)); ?>
 
    <p>Patikala SMS (pSMS) merupakan sistem informasi layanan pesan singkat (sms) yang diperuntukkan pada kalangan Instansi, Akademik, perusahaan dll.</p>
    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Learn more',
    )); ?></p>
 
<?php $this->endWidget(); ?>




