<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class MessageGroupForm extends CFormModel
{
	public $message;
	public $status_id;
	public $group_id;
	public $is_details;
	public $flag;
	public $schedule;	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('message,group_id', 'required'),
			array('message', 'length', 'max'=>160),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'status_id'=>'Status Penerima Pesan',
			'message'=>'Pesan',
			'group_id'=>'Nama Grup',
			'is_details'=>'Model Pesan',
			'flag'=>'Status Pesan',
			'schedule'=>'Jadwal',				
		);
	}
}