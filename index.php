<?php

require('models/model.php');
require('views/view.php');
require('controllers/controller.php');

try{
	$model = new Model;
	$controller = new Controller($model);
	$view = new View($controller, $model);
} catch(Exception $e){
	die('Caught exception: '.  $e->getMessage(). "\n");
}

if (isset($_GET)){
	if(isset($_GET['getBook'])){
		$controller->getBook($_GET['getBook']);
	}
}


/*

	http://php-html.net/tutorials/model-view-controller-in-php/


*/

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>BookDB</title>
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<?php $view->title(); ?>

	<div id="box">
		<?php
			if(isset($model->bookInfo['title'])){
				$view->bookInfo();
			}
			else{
				$view->bookList();
			}
		?>
	</div>
</body>

</html> 