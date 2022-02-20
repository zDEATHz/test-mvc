<?php

class Tasks_Model extends Model {
	
	public $id;
	public $user;
	public $email;
	public $content;
	public $status;
	public $edited;

	public function fieldsTable(){
		return array(
			'id' => 'Id',
			'user' => 'User',
			'email' => 'Email',
			'content' => 'Content',
			'status'  => 'Status',
			'edited'  => 'Edited'
		);
	}

	
}