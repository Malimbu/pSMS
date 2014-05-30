<?php

/**
 * This is the model class for table "tbl_member_group".
 *
 * The followings are the available columns in table 'tbl_member_group':
 * @property integer $id
 * @property integer $member_id
 * @property integer $group_id
 */
class MemberGroup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_member_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, group_id', 'numerical', 'integerOnly'=>true),
			array('id, member_id, group_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'member_id' => 'Member',
			'group_id' => 'Group',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('group_id',$this->group_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MemberGroup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Usage for timestamp for table
	 */
	/*	
    protected function beforeValidate ()
    {
        $this->date = strtotime ($this->date);
        $this->date = date ('Y-m-d', $this->date);			
        return parent::beforeValidate ();
    } 
	*/
	
	/**
	 * Usage for Created & Modified for table
	 */	
	/* 
    public function beforeSave() {
      	if ($this->isNewRecord) {
        	$this->created_by = Yii::app()->user->id ;
            $this->created_on = new CDbExpression('NOW()');
       	} else {
        	$this->modified_by = Yii::app()->user->id ;
            $this->modified_on = new CDbExpression('NOW()');	
      	}
        return parent::beforeSave();
    }
	*/
	
	/**
	 * Usage for Format Date in CGridview and Listview
	 */
    /*
	protected function afterFind ()
    {
        $this->date = strtotime ($this->date);
        $this->date = date ('d-m-Y', $this->date);		
        parent::afterFind ();
    }
	*/
}