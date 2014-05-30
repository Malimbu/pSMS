<?php

class MessageController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'group', 'individu', 'broadcash'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionBroadcash() {
        $model = new MessageBroadCashForm;
        

        if (isset($_POST['MessageBroadCashForm'])) {
            $model->attributes = $_POST['MessageBroadCashForm'];
            if ($model->validate()) {
                $status_id = $_POST['MessageBroadCashForm']['status_id'];
                $is_details = $_POST['MessageBroadCashForm']['is_details'];
                $flag = $_POST['MessageBroadCashForm']['flag'];
                $schedule = $_POST['MessageBroadCashForm']['schedule'];
                $date_time = (strlen($schedule) < 1) ? '-' : $schedule;

                if ($status_id === 'y') {
                    $model_donasi = Member::model()->findAllByAttributes(array('status' => 'y'));
                } elseif ($status_id === 'n') {
                    $model_donasi = Member::model()->findAllByAttributes(array('status' => 'n'));
                } else {
                    $model_donasi = Member::model()->findAll();
                }

                foreach ($model_donasi as $row) {
                    $name = $row->name;
                    $phone_number = $row->phone_number;
                    $creator_id = $row->id; 
                    $message = $this->getMessage($is_details, $name, $model->message);

                    Outbox::model()->sendSms($phone_number, $message, $flag, $date_time, $creator_id);
                }


                Yii::app()->user->setFlash('success', '<strong>Pesan Terkirim!</strong> Semua Pesan sudah sukses terkirim. Jumlah penerima ' . count($model_donasi));

                $this->redirect(array('broadcash'));
            }
        }

        $this->render('broadcash', array('model' => $model));
    }

    public function actionGroup() {
        $model = new MessageGroupForm;

        if (isset($_POST['MessageGroupForm'])) {
            $model->attributes = $_POST['MessageGroupForm'];

            if ($model->validate()) {
                $group_id = $_POST['MessageGroupForm']['group_id'];
                $is_details = $_POST['MessageGroupForm']['is_details'];
                $flag = $_POST['MessageGroupForm']['flag'];
                $schedule = $_POST['MessageGroupForm']['schedule'];
                $date_time = (strlen($schedule) < 1) ? '-' : $schedule;

                $arr = '';
                for ($i = 0; $i < count($group_id); $i++) {
                    if ($i == 0) {
                        $arr = $arr . "g.group_id=" . $group_id[$i];
                    } else {
                        $arr = $arr . " or g.group_id=" . $group_id[$i];
                    }
                }

                $model5 = Yii::app()->db->createCommand()
                        ->select('m.id as id, name,phone_number')
                        ->from('tbl_member m')
                        ->join('tbl_member_group g', 'g.member_id=m.id')
                        ->group('phone_number')
                        ->where('g.group_id=1' or 'g.group_id=3')
                        ->where($arr)
                        ->queryAll();

                foreach ($model5 as $row) {

                    $name = $row['name'];
                    $phone_number = $row['phone_number'];
                    $creator_id = $row['id'];                    
                    $message = $this->getMessage($is_details, $name, $model->message);

                    Outbox::model()->sendSms($phone_number, $message, $flag, $date_time, $creator_id);
                }

                Yii::app()->user->setFlash('success', '<strong>Pesan Terkirim!</strong> Semua Pesan sudah sukses terkirim. Jumlah penerima ' . count($model5));

                $this->redirect(array('group'));
            }
            //if($model->save())
        }

        $this->render('group', array('model' => $model));
    }

    public function actionIndividu() {
        $model = new MessageForm;

        if (isset($_POST['MessageForm'])) {
            $model->attributes = $_POST['MessageForm'];
            if ($model->validate()) {
                $group_id = $_POST['MessageForm']['member_id'];
                $is_details = $_POST['MessageForm']['is_details'];
                $flag = $_POST['MessageForm']['flag'];
                $schedule = $_POST['MessageForm']['schedule'];
                $date_time = (strlen($schedule) < 1) ? '-' : $schedule;

                //echo $date_time;
                //exit;

                $arr = '';
                for ($i = 0; $i < count($group_id); $i++) {
                    if ($i == 0) {
                        $arr = $arr . "id=" . $group_id[$i];
                    } else {
                        $arr = $arr . " or id=" . $group_id[$i];
                    }
                }

                $model5 = Yii::app()->db->createCommand()
                        ->select('id, name, phone_number')
                        ->from('tbl_member')
                        ->where($arr)
                        ->queryAll();

                foreach ($model5 as $row) {
                    $name = $row['name'];
                    $creator_id=$row['id'];
                    $phone_number = $row['phone_number'];
                    $message = $this->getMessage($is_details, $name, $model->message);

                    Outbox::model()->sendSms($phone_number, $message, $flag, $date_time, $creator_id);




                    /*
                      $model_sms=new Outbox;
                      $model_sms->DestinationNumber=$phone_number;
                      $model_sms->TextDecoded=$message;
                      $model_sms->Class = ($flag=='f') ? 1 : -1 ;
                      $model_sms->save();
                     */

                    /*
                      $tot_sms=ceil(strlen($message)/153);
                      $split_sms=str_split($message, 153);
                      $random=rand(1, 255);
                      $header_udh=sprintf('%02s',strtoupper(dechex($random)));

                      for ($i = 1; $i <= $tot_sms; $i++) {
                      $udh='050003'.$header_udh.sprintf('%02s',$tot_sms).sprintf('%02s',$i);
                      $msg=$split_sms[$i-1];

                      if ($i==1) {
                      $model_sms=new Outbox;
                      $model_sms->DestinationNumber=$phone_number;
                      $model_sms->UDH=$udh;
                      $model_sms->TextDecoded=$msg ;
                      $model_sms->MultiPart=($tot_sms>1)?'true':'false';
                      $model_sms->Class = ($flag=='f') ? 0 : -1 ;
                      $model_sms->save();
                      } else {
                      $outbox_multipart=new OutboxMultipart;
                      $outbox_multipart->UDH=$udh;
                      $outbox_multipart->TextDecoded=$msg;
                      $outbox_multipart->ID=$model_sms->ID;
                      $outbox_multipart->SequencePosition=$i;
                      $outbox_multipart->save();
                      }
                      }
                     */
                }

                Yii::app()->user->setFlash('success', '<strong>Pesan Terkirim!</strong> Semua Pesan sudah sukses terkirim. Jumlah penerima ' . count($model5));

                $this->redirect(array('individu'));
            }
        }

        $this->render('individu', array('model' => $model));
    }

    public function getMessage($status, $name, $message) {
        $txt_message;
        if ($status == 's') {
            $txt_message = $message;
        } else {
            $txt_message = 'Yth. Bapak/Ibu ' . $name . ', ' . $message;
        }

        return $txt_message;
    }

}