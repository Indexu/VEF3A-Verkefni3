<?php

class Model {
	public $books = array();
	public $bookInfo = array();
	public $tite;
	
	public function __construct(){
		/*$this->books[0][0] = 'The Lord of the Rings';
		$this->books[0][1] = '2nd edition';
		$this->books[0][2] = '1937';
		
		$this->books[1][0] = 'A Song of Ice and Fire: A Game of Thrones';
		$this->books[1][1] = '4th edition';
		$this->books[1][2] = '2002';
		
		$this->books[2][0] = 'Harry Potter';
		$this->books[2][1] = '1st edition';
		$this->books[2][2] = '1996';*/
		
		$this->title = "BookDB";
		
		try{
			$json = file_get_contents('data/books.json');
			$this->books = json_decode($json, true);
		} catch(Exception $e){
			 die('Caught exception: '.  $e->getMessage(). "\n");
		}
		
		
	}
	
	public function getBookList(){
		$bookArray = array();
		
		for($i = 0; $i < count($this->books['books']); $i++) {
			array_push($bookArray, $this->books['books'][$i]['title']);
		}
		
		return $bookArray;
	}
	
	public function getBookInfo($bookName){		
		for($i = 0; $i < count($this->books['books']); $i++) {
			if($this->books['books'][$i]['title'] == $bookName){
				return $this->books['books'][$i];
			}
		}
		
		return false;
	}
}