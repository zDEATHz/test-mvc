<?php

class IndexController extends Controller {


	public function __construct() {
		$this->pageData['message']="";
		$this->view = new View();
	}


	public function index() {
		$pageTpl = '/views/main.tpl.php';
		$model = new Tasks_Model();

		
		// Сортировка по умолчанию
		$sort='user';
		
		// Пагинация
		if(empty($this->args['page'])){
			$page=1;
		}
		else{
			$page=intval($this->args['page']);
		}
		$count = $model->getCount();
		$totalPage = intval(($count - 1) / TASK_LIMIT) + 1;
		if(empty($page) or $page < 0) $page = 1;
		if($page > $totalPage) $page = $totalPage;
		$startPage = $page * TASK_LIMIT - TASK_LIMIT;
		
		$this->pageData['page'] = $page;
		$this->pageData['totalPage'] = $totalPage;
		// end Пагинация
		
		// Сортировка
		if ((isset($_COOKIE["sort"]) ) && ($_COOKIE["sort"] == 'user' || $_COOKIE["sort"] == 'email' || $_COOKIE["sort"] == 'status')){
			$sort=$_COOKIE["sort"];
		}
		
		if( isset($_COOKIE["sort_way"]) && $_COOKIE["sort_way"] == "asc"){
			$sort_way = "ASC";
		}
		else{
			$sort_way = "DESC";
		}
		
		$select = array(
			//'where' => 'id >= 1 AND id <= 5', // условие
			//'group' => 'first_name', // группируем
			'order' => "$sort $sort_way", // сортируем
			'limit' => "$startPage, ".TASK_LIMIT // задаем лимит
		);
		
		$this->pageData['title'] = "Тестовый MVC";
		$this->pageData['tasks'] = $model->getRows($select);
		$this->view->render($pageTpl, $this->pageData);
	}
	
	public function edit(){
		$pageTpl = '/views/edit.tpl.php';
		$model = new Tasks_Model();
		$isAdmin=false;
		
		$login = new UserController();
		
		if($login->isAdmin()){
			$isAdmin=true;
		}
		
		
		if(!empty($_POST['user']) && !empty($_POST['email']) && !empty($_POST['content']) ){


			$model->user = strip_tags($_POST['user']);
			$model->email = strip_tags($_POST['email']);
			$model->content = strip_tags($_POST['content']);
			
			if($isAdmin){
				$model->edited = 1;
				if(!isset($_POST['status'])){
					$model->status = 0;
				}
				else{
					$model->status = 1;
				}
			}

			if(($this->args['action'] == 'edit') && (!empty($_POST['id']))){
				$model->id = intval($_POST['id']);
				if($model->update()){
					$this->pageData['message'] = "Запись успешно обновлена";
				}
				else{
					$this->pageData['message'] = "Ошибка записи";
				}
			}elseif($this->args['action'] == 'add'){
				$model->edited = 0;
				if($model->save()){
					$this->pageData['message'] = "Запись успешно добавлена";
				}
				else{
					$this->pageData['message'] = "Ошибка записи";
				}
			}
			
		}
		
		$this->pageData['isAdmin'] = $isAdmin;
		
		if(isset($this->args['id'])){
			
			$id= intval($this->args['id']);
			
			$result = $model->getRowById(intval ($id));
			if($result){
				$this->pageData['tasks'] = $result;
				$this->pageData['title'] = "Редактирование задачи";
				$this->pageData['action'] = "edit";
			}
			else{
				$pageTpl = '/views/error.tpl.php';
			}
		}
		else{
			$this->pageData['title'] = "Добавление задачи";
			$this->pageData['tasks'] = [];
			$this->pageData['tasks']['status'] = 0;
			$this->pageData['tasks']['content'] = '';
			$this->pageData['tasks']['user'] = '';
			$this->pageData['tasks']['email'] = '';
			$this->pageData['tasks']['id'] = false;
			$this->pageData['action'] = "add";
		}
		
		$this->view->render($pageTpl, $this->pageData);
	}
	

}