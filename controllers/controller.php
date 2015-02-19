<?php

class Controller {
		public $model;
		
		public function __construct(Model $model){
			$this->model = $model;
		}
		
		public function getBook($book){
			$this->model->bookInfo = $this->model->getBookInfo($book);
		}
}