<?php

/**
 * This is the model class for table "tbl_group".
 *
 * The followings are the available columns in table 'tbl_group':
 * @property integer $id
 * @property string $name
 * @property string $active
 */
class Group extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>15),
			array('active', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, active', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'active' => 'Active',
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
		$criteria->compare('active',$this->active,true);

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
	 * @return Group the static model class
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
