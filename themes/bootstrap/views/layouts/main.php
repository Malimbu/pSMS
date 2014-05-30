<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <?php //Yii::app()->bootstrap->register(); ?>
    </head>

    <body>

        <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'type' => 'null',
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array('label' => 'Beranda', 'icon' => 'icon-home', 'url' => array('/site/index')),
                        array('label' => 'Master', 'icon' => 'icon-book', 'url' => '#', 'items' => array(
                                array('label' => 'Anggota', 'icon' => 'icon-user', 'url' => array('/member/admin')),
                                array('label' => 'Grup', 'icon' => 'icon-book', 'url' => array('/group/admin')),
                            // '---',
                            // array('label'=>'User System','icon'=>'icon-user', 'url'=>array('user/admin')),                	    	 
                            ), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Pesan', 'icon' => 'icon-list-alt', 'url' => '#', 'items' => array(
                                //array('label' => 'Cek Pulsa', 'url' => array('/pulseCheck/index')),
                                array('label' => 'Pesan Masuk', 'icon'=>'icon-inbox', 'url' => array('/inbox/admin')),
                                array('label' => 'Pesan Keluar', 'icon'=>'icon-upload', 'url' => array('/outbox/admin')),
                                array('label' => 'Pesan Terkirim', 'icon'=>'icon-ok-sign', 'url' => array('/sentitems/admin')),
                                '---',
                                array('label' => 'Kirim Pesan Massal', 'icon'=>'icon-random', 'url' => array('/message/broadcash')),
                                array('label' => 'Kirim Pesan Group', 'icon'=>'icon-th-list', 'url' => array('/message/group')),
                                array('label' => 'Kirim Pesan Individu', 'icon'=>'icon-envelope', 'url' => array('/message/individu')),
                            ), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Tentang', 'icon' => 'icon-info-sign', 'url' => array('/site/page', 'view' => 'about'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Kontak', 'icon' => 'icon-question-sign', 'url' => array('/site/contact'), 'visible' => Yii::app()->user->isGuest),
                    ),
                ),
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        //array('label' => 'Saldo Rp.16.850,00 (28 Maret 14)', 'icon' => 'icon-table', 'url' => '', 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Login', 'icon' => 'icon-user', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'icon' => 'icon-off', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                    ),
                ),
            ),
        ));
        ?>

        <div class="container" id="page">

        <?php if (isset($this->breadcrumbs)): ?>
            <?php
            $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                'links' => $this->breadcrumbs,
            ));
            ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php
            $this->widget('bootstrap.widgets.TbAlert', array(
                'block' => true,
                'fade' => true,
                'closeText' => '&times;', // false equals no close link
                'events' => array(),
                'htmlOptions' => array(),
                'userComponentId' => 'user',
                'alerts' => array(// configurations per alert type
                    // success, info, warning, error or danger
                    'success' => array('closeText' => '&times;'),
                    'info', // you don't need to specify full config
                    'warning' => array('block' => false, 'closeText' => false),
                    'error' => array('block' => true, 'closeText' => '&times;')
                ),
            ));
            ?> 


            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">

                Copyright &copy; <?php echo date('Y'); ?> by mgafur@ymail.com, 
                All Rights Reserved.<br/>
                Malimbu Enterprice Solution
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
