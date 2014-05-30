<?php

/**
 * This is the model class for table "outbox".
 *
 * The followings are the available columns in table 'outbox':
 * @property string $UpdatedInDB
 * @property string $InsertIntoDB
 * @property string $SendingDateTime
 * @property string $SendBefore
 * @property string $SendAfter
 * @property string $Text
 * @property string $DestinationNumber
 * @property string $Coding
 * @property string $UDH
 * @property integer $Class
 * @property string $TextDecoded
 * @property string $ID
 * @property string $MultiPart
 * @property integer $RelativeValidity
 * @property string $SenderID
 * @property string $SendingTimeOut
 * @property string $DeliveryReport
 * @property string $CreatorID
 * @property string $Schedule
 */
class Outbox extends CActiveRecord {
    
    public $member_search;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'outbox';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('DestinationNumber, TextDecoded', 'required'), //UpdatedInDB,CreatorID 
            array('Class, RelativeValidity', 'numerical', 'integerOnly' => true),
            array('DestinationNumber', 'length', 'max' => 20),
            array('Coding', 'length', 'max' => 22),
            array('MultiPart', 'length', 'max' => 5),
            array('SenderID', 'length', 'max' => 255),
            array('DeliveryReport', 'length', 'max' => 7),
            array('InsertIntoDB, SendingDateTime, SendBefore, SendAfter, Text, UDH, SendingTimeOut', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('UpdatedInDB, InsertIntoDB, SendingDateTime, SendBefore, SendAfter, Text, DestinationNumber, Coding, UDH, Class, TextDecoded, ID, MultiPart, RelativeValidity, SenderID, SendingTimeOut, DeliveryReport, CreatorID, Schedule, member_search', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'member'=>array(self::BELONGS_TO,'Member','CreatorID'),          
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'UpdatedInDB' => 'Updated In Db',
            'InsertIntoDB' => 'Insert Into Db',
            'SendingDateTime' => 'Tanggal Kirim',
            'SendBefore' => 'Send Before',
            'SendAfter' => 'Send After',
            'Text' => 'Text',
            'DestinationNumber' => 'No. Tujuan',
            'Coding' => 'Coding',
            'UDH' => 'Udh',
            'Class' => 'Status Pesan',
            'TextDecoded' => 'Isi Pesan',
            'ID' => 'Id',
            'MultiPart' => 'Multi Part',
            'RelativeValidity' => 'Relative Validity',
            'SenderID' => 'Sender',
            'SendingTimeOut' => 'Sending Time Out',
            'DeliveryReport' => 'Delivery Report',
            'CreatorID' => 'Creator',
            'Schedule' => 'Jadwal',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->with = array( 'member' );
        $criteria->compare('UpdatedInDB', $this->UpdatedInDB, true);
        $criteria->compare('InsertIntoDB', $this->InsertIntoDB, true);
        $criteria->compare('SendingDateTime', $this->SendingDateTime, true);
        $criteria->compare('SendBefore', $this->SendBefore, true);
        $criteria->compare('SendAfter', $this->SendAfter, true);
        $criteria->compare('Text', $this->Text, true);
        $criteria->compare('DestinationNumber', $this->DestinationNumber, true);
        $criteria->compare('Coding', $this->Coding, true);
        $criteria->compare('UDH', $this->UDH, true);
        $criteria->compare('Class', $this->Class);
        $criteria->compare('TextDecoded', $this->TextDecoded, true);
        $criteria->compare('ID', $this->ID, true);
        $criteria->compare('MultiPart', $this->MultiPart, true);
        $criteria->compare('RelativeValidity', $this->RelativeValidity);
        $criteria->compare('SenderID', $this->SenderID, true);
        $criteria->compare('SendingTimeOut', $this->SendingTimeOut, true);
        $criteria->compare('DeliveryReport', $this->DeliveryReport, true);
        $criteria->compare('CreatorID', $this->CreatorID, true);
        $criteria->compare('Schedule', $this->Schedule, true);
        $criteria->compare('member.name', $this->member_search, true);        
        $criteria->order = "SendingDateTime Desc";

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 25),
            'sort'=>array(
                'attributes'=>array(
                    'member_search'=>array(
                        'asc'=>'member.name',
                        'desc'=>'member.name DESC',
                    ),
                    '*',
                ),
            ),            
        ));
    }

    
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Outbox the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Usage for timestamp for table
     */
    protected function beforeValidate() {
        $this->SendingDateTime = strtotime($this->SendingDateTime);
        $this->SendingDateTime = date('Y-m-d H:i', $this->SendingDateTime);
        return parent::beforeValidate();
    }

    /**
     * Usage for Created & Modified for table
     */
    public function beforeSave() {
        if ($this->isNewRecord) {
            //$this->CreatorID = Yii::app()->user->id ;
            //$this->created_on = new CDbExpression('NOW()');
        } else {
            //$this->CreatorID = Yii::app()->user->id ;
            //$this->modified_on = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }

    /**
     * Usage for Format Date in CGridview and Listview
     */
    protected function afterFind() {
        $this->SendingDateTime = strtotime($this->SendingDateTime);
        $this->SendingDateTime = date('d-m-Y H:i', $this->SendingDateTime);
        parent::afterFind();
    }

    public function sendSms($destination_number, $message, $flag, $date_time, $creator_id) {

        if (strlen($message) <= 160) {
            $Outbox = new Outbox;
            $Outbox->DestinationNumber = $destination_number;
            $Outbox->TextDecoded = $message;
            $Outbox->CreatorID = $creator_id;
            if ($date_time <> '-') {
                $Outbox->SendingDateTime = $date_time;
                $Outbox->Schedule = 'true';
            }
            $Outbox->Class = ($flag == 'f') ? 1 : -1;
            $Outbox->save();
        } else {
            $tot_sms = ceil(strlen($message) / 153);
            $split_sms = str_split($message, 153);
            $random = rand(1, 255);
            $header_udh = sprintf('%02s', strtoupper(dechex($random)));

            for ($i = 1; $i <= $tot_sms; $i++) {
                $udh = '050003' . $header_udh . sprintf('%02s', $tot_sms) . sprintf('%02s', $i);
                $msg = $split_sms[$i - 1];

                if ($i == 1) {
                    $Outbox = new Outbox;
                    $Outbox->DestinationNumber = $destination_number;
                    $Outbox->UDH = $udh;
                    $Outbox->TextDecoded = $msg;
                    $Outbox->CreatorID = $creator_id;
                    $Outbox->MultiPart = ($tot_sms > 1) ? 'true' : 'false';
                    $Outbox->Class = ($flag == 'f') ? 0 : -1;
                    if ($date_time <> '-') {
                        $Outbox->SendingDateTime = $date_time;
                        $Outbox->Schedule = 'true';
                    }
                    $Outbox->save();
                } else {
                    $outbox_multipart = new OutboxMultipart;
                    $outbox_multipart->UDH = $udh;
                    $outbox_multipart->TextDecoded = $msg;
                    $outbox_multipart->ID = $Outbox->ID;
                    $outbox_multipart->SequencePosition = $i;
                    $outbox_multipart->save();
                }
            }
        }
    }

    public function sendSmsMultiPart($destination_number, $message, $flag, $date_time) {
        $tot_sms = ceil(strlen($message) / 153);
        $split_sms = str_split($message, 153);
        $random = rand(1, 255);
        $header_udh = sprintf('%02s', strtoupper(dechex($random)));

        for ($i = 1; $i <= $tot_sms; $i++) {
            $udh = '050003' . $header_udh . sprintf('%02s', $tot_sms) . sprintf('%02s', $i);
            $msg = $split_sms[$i - 1];

            if ($i == 1) {
                $Outbox = new Outbox;
                $Outbox->DestinationNumber = $destination_number;
                $Outbox->UDH = $udh;
                $Outbox->TextDecoded = $msg;
                $Outbox->MultiPart = ($tot_sms > 1) ? 'true' : 'false';
                $Outbox->Class = ($flag == 'f') ? 0 : -1;
                if ($date_time <> '-') {
                    $Outbox->SendingDateTime = $date_time;
                    $Outbox->Schedule = 'true';
                }
                $Outbox->save();
            } else {
                $outbox_multipart = new OutboxMultipart;
                $outbox_multipart->UDH = $udh;
                $outbox_multipart->TextDecoded = $msg;
                $outbox_multipart->ID = $Outbox->ID;
                $outbox_multipart->SequencePosition = $i;
                $outbox_multipart->save();
            }
        }
    }

}
