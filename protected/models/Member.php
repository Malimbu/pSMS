<?php

/**
 * This is the model class for table "tbl_member".
 *
 * The followings are the available columns in table 'tbl_member':
 * @property integer $id
 * @property string $name
 * @property string $phone_number
 * @property string $address
 * @property integer $city_id
 * @property string $note
 * @property string $status
 */
class Member extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phone_number,name','required'),
			array('phone_number','unique'),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('name, address', 'length', 'max'=>45),
			array('phone_number', 'length', 'max'=>15),
			array('note', 'length', 'max'=>100),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, phone_number, address, city_id, note, status', 'safe', 'on'=>'search'),
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
			'name' => 'Nama',
			'phone_number' => 'No. Handphone',
			'address' => 'Alamat',
			'city_id' => 'Kota',
			'note' => 'Catatan',
			'status' => 'Status',
			'group_id'=>'Nama Grup',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getOptions()
	{
		$_items=array();
		$models=self::model()->findAll();
		foreach($models as $model) {
			$_items[$model->id]=$model->name;
		}
		return $_items;    	    	
	} 	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Member the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
