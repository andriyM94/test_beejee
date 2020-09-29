<?php
namespace app\models;

use app\lib\Db;

class Main
{
	public $db;

	public function __construct() {
		$this->db = new Db;
	}

	public function getData()
	{
		$result = $this->db->row('SELECT * FROM tasks');
		return $result;
	}

	public function getCount()
	{
		$result = $this->db->row('SELECT COUNT(*) FROM tasks');
		return $result;
	}

	public function getLimitTasks($start, $num)
	{	
		$result = $this->db->row('SELECT * FROM tasks LIMIT '.$start.', '.$num.' ');
		return $result;
	}

	public function getLimitTasksBy($start, $num, $sort_name, $sort_by)
	{	
		$result = $this->db->row('SELECT * FROM tasks ORDER BY '.$sort_name.' '.$sort_by.' LIMIT '.$start.', '.$num.' ');
		return $result;
	}

	public function getNewTask() {
		if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['text_task']) ) {
			$text = htmlentities($_POST['text_task']);
			$result = $this->db->row('INSERT INTO `tasks` ( `username`, `email`, `text_task`) VALUES ( \''.$_POST['username'].'\',  \''.$_POST['email'].'\' , \''.$text.'\');');
			return true;
		}
	}

	public function editTask() {
		if (isset($_POST['text_task']) ) {
			$text = htmlentities($_POST['text_task']);
			if (isset($_POST['status'])) {
				$status = 1;
			} else {
				$status = 0;
			}

			$text = $this->db->row('SELECT * FROM `tasks` WHERE `id` = '.$_POST['id'].'');

			if ($_POST['text_task'] == $text[0]['text_task']) {
				$onchange = 0;
			} else {
				$onchange = 1;
			}
			$result = $this->db->row('UPDATE `tasks` SET `text_task`= \''.$_POST['text_task'].'\', `status` = '.$status.', `onchange` = '.$onchange.' WHERE `id` = '.$_POST['id'].'');
			return $result;
		}
	}

	public function logIn() {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$result = $this->db->row('SELECT * FROM `user` WHERE `username` LIKE \''.$_POST['username'].'\' AND `password` LIKE \''.$_POST['password'].'\' AND `admin` LIKE 777 ');
			if (count($result) == 0) {
				return false;
			} else {
				return true;
			}
		}
	}

}
