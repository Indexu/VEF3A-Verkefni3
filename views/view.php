<?php

class View {
	public $model;
	private $controller;
	
	public function __construct(Controller $controller, Model $model) {
		$this->controller = $controller;
		$this->model = $model;
	}
	
	public function title(){
		echo '<h1><a href="http://tsuts.tskoli.is/2t/2307942949/vef3a/verkefni3/">' . $this->model->title . '</a></h1>';
	}
	
	public function bookList(){
		$bookList = $this->model->getBookList();
		
		/*echo '<pre>';
		print_r($this->model->books);
		echo '</pre>';*/
		
		echo '<form method="get">';
			echo '<select name="getBook">';
				for($i = 0; $i < count($bookList); $i++){
					echo '<option value="'.$bookList[$i].'">'. $bookList[$i] .'</option>';
				}
			echo '</select>';
			
			echo '<input type="submit" value="Get Book">';
		echo '</form>';
	}
	
	
	public function bookInfo(){
		echo '<p>Title: ' . $this->model->bookInfo['title'] . '</p>';
		echo '<p>Edition: ' . $this->model->bookInfo['edition'] . '</p>';
		echo '<p>Year: ' . $this->model->bookInfo['year'] . '</p>';
	}
}