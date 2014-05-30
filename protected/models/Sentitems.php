<?php

/**
 * This is the model class for table "sentitems".
 *
 * The followings are the available columns in table 'sentitems':
 * @property string $UpdatedInDB
 * @property string $InsertIntoDB
 * @property string $SendingDateTime
 * @property string $DeliveryDateTime
 * @property string $Text
 * @property string $DestinationNumber
 * @property string $Coding
 * @property string $UDH
 * @property string $SMSCNumber
 * @property integer $Class
 * @property string $TextDecoded
 * @property string $ID
 * @property string $SenderID
 * @property integer $SequencePosition
 * @property string $Status
 * @property integer $StatusError
 * @property integer $TPMR
 * @property integer $RelativeValidity
 * @property string $CreatorID
 */
class Sentitems extends CActiveRecord {

    public $member_search;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sentitems';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('UpdatedInDB, Text, UDH, TextDecoded, SenderID, CreatorID', 'required'),
            array('Class, SequencePosition, StatusError, TPMR, RelativeValidity', 'numerical', 'integerOnly' => true),
            array('DestinationNumber, SMSCNumber', 'length', 'max' => 20),
            array('Coding', 'length', 'max' => 22),
            array('ID', 'length', 'max' => 10),
            array('SenderID', 'length', 'max' => 255),
            array('Status', 'length', 'max' => 17),
            array('InsertIntoDB, SendingDateTime, DeliveryDateTime', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('UpdatedInDB, InsertIntoDB, SendingDateTime, DeliveryDateTime, Text, DestinationNumber, Coding, UDH, SMSCNumber, Class, TextDecoded, ID, SenderID, SequencePosition, Status, StatusError, TPMR, RelativeValidity, CreatorID, member_search', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'members'=>array(self::BELONGS_TO,'Member','CreatorID'),                      
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'UpdatedInDB' => 'Updated In Db',
            'InsertIntoDB' => 'Insert Into Db',
            'SendingDateTime' => 'Tgl. Kirim',
            'DeliveryDateTime' => 'Tgl. Terima',
            'Text' => 'Text',
            'DestinationNumber' => 'No. Handphone',
            'Coding' => 'Coding',
            'UDH' => 'Udh',
            'SMSCNumber' => 'Smscnumber',
            'Class' => 'Class',
            'TextDecoded' => 'Pesan',
            'ID' => 'ID',
            'SenderID' => 'Sender',
            'SequencePosition' => 'Sequence Position',
            'Status' => 'Status',
            'StatusError' => 'Status Error',
            'TPMR' => 'Tpmr',
            'RelativeValidity' => 'Relative Validity',
            'CreatorID' => 'Creator',
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

        $criteria->with = array( 'members' );
        $criteria->compare('UpdatedInDB', $this->UpdatedInDB, true);
        $criteria->compare('InsertIntoDB', $this->InsertIntoDB, true);
        $criteria->compare('SendingDateTime', $this->SendingDateTime, true);
        $criteria->compare('DeliveryDateTime', $this->DeliveryDateTime, true);
        $criteria->compare('Text', $this->Text, true);
        $criteria->compare('DestinationNumber', $this->DestinationNumber, true);
        $criteria->compare('Coding', $this->Coding, true);
        $criteria->compare('UDH', $this->UDH, true);
        $criteria->compare('SMSCNumber', $this->SMSCNumber, true);
        $criteria->compare('Class', $this->Class);
        $criteria->compare('TextDecoded', $this->TextDecoded, true);
        $criteria->compare('ID', $this->ID, true);
        $criteria->compare('SenderID', $this->SenderID, true);
        $criteria->compare('SequencePosition', $this->SequencePosition);
        //$criteria->compare('t.Status', $this->Status, true);
        $criteria->compare('t.Status', $this->getSwitch($this->Status), true);        
        $criteria->compare('StatusError', $this->StatusError);
        $criteria->compare('TPMR', $this->TPMR);
        $criteria->compare('RelativeValidity', $this->RelativeValidity);
        $criteria->compare('CreatorID', $this->CreatorID, true);
        $criteria->compare('members.name', $this->member_search, true);  
        $criteria->order = "SendingDateTime Desc";

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 25),
            'sort'=>array(
                'attributes'=>array(
                    'member_search'=>array(
                        'asc'=>'members.name',
                        'desc'=>'members.name DESC',
                    ),
                    '*',
                ),
            ),             
        ));
    }
    
    //function that returns usual 0 or 1 value dependently user input
    public function getSwitch($switch)
    {
        if(is_null($switch)) return $switch; //null shows all records
        if($switch == '1') {
            return "SendingOK";
        } elseif($switch == '2') {
            return "Error";
        } else {
            return null; //all fields
        }
    }

    public function searchError() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->with = array( 'members' );
        $criteria->compare('SendingDateTime', $this->SendingDateTime, true);
        $criteria->compare('DeliveryDateTime', $this->DeliveryDateTime, true);
        $criteria->compare('Text', $this->Text, true);
        $criteria->compare('DestinationNumber', $this->DestinationNumber, true);
        $criteria->compare('Coding', $this->Coding, true);
        $criteria->compare('TextDecoded', $this->TextDecoded, true);
        $criteria->compare('ID', $this->ID, true);
        $criteria->compare('SenderID', $this->SenderID, true);
        $criteria->compare('Status', $this->Status, true);
        $criteria->compare('StatusError', $this->StatusError);
        $criteria->compare('CreatorID', $this->CreatorID, true);
        $criteria->compare('members.name', $this->member_search, true);
        $criteria->addCondition("Status='SendingError'");
        $criteria->order = "SendingDateTime Desc";

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 25),
            'sort'=>array(
                'attributes'=>array(
                    'member_search'=>array(
                        'asc'=>'members.name',
                        'desc'=>'members.name DESC',
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
     * @return Sentitems the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * Usage for Format Date in CGridview and Listview
     */
    protected function afterFind() {
        $this->SendingDateTime = strtotime($this->SendingDateTime);
        $this->SendingDateTime = date('d-m-Y H:i', $this->SendingDateTime);
        parent::afterFind();
    }
    

}
