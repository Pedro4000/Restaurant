<?php



//models/MealMode.class.php

//models/MealMode.class.php

class OrderModel {

	public function displayOrder(){

			





	}



	public function find($orderId){

	$database= new Database();

	$sql = 'SELECT * FROM `Order` WHERE Id=?';

	return $database->queryOne($sql,[$oderId]);	
		
		
		
		
	}
}


?>
