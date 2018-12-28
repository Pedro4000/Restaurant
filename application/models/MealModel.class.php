
<?php

class MealModel 
	

	{

		public function listAll(){

			$meals= new Database();

			$sql= 'Select* FROM Meal';

			return $meals -> query($sql);


	}




		public function listOne($mealId){

			$meal= new Database();

			$value = [$mealId];

			$sql= 'Select* FROM Meal WHERE Id=?';

			return $meal -> queryOne($sql,$value);


	}
}




?>