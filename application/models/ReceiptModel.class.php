<?php



//models/MealMode.class.php

//models/MealMode.class.php


class ReceiptModel {


   public function displayOrder()
   {

	    $k = json_decode($_POST['hiddenOrder']);


	    //charger les meals

    	$mealzmodel = new MealModel() ;

        $allmealz = $mealzmodel->listAll();


        //creer un index prixsecure 

        foreach ($k as $keach) 
        {
        	
        	foreach ($allmealz as $meal) {
        		
        		if ($keach->id==$meal['Id']) {
        			$keach->prixsecure=$meal['SalePrice'];
        		
        		}

        	}
        }


       	$prixsecure=0;

	    foreach ($k as $minik) 
	    {
	    	$prixsecure+= floatval($minik->prixsecure)*floatval($minik->quantite);

	    }


	    $prixTVA=0.2*$prixsecure;
	    var_dump($prixTVA);

	    $prixTTC=1.2*$prixsecure;
	    var_dump($prixTTC);

	    $TVA=0.2;

	    // ENREGISTRER DANS ORDER

		$finalreceipt= new Database();

	    $sql= 'INSERT INTO `Order`(`User_Id`, `TotalAmount`, `TaxRate`, `TaxAmount`, `CreationTimestamp`, `CompleteTimestamp`) VALUES (?,?,?,?,NOW(),NOW());';

		$values=(
			  	[
			  	$_SESSION['user']['Id'],
			  	$prixTTC,
			  	$TVA,
			  	$prixTVA,
			   	]);


		$finalreceipt -> executeSql($sql, $values);

		// RECUPERER DE ORDER

    	$database = new Database();
        $sql = 'SELECT * FROM `Order`WHERE `User_Id`=? ORDER BY `Id` DESC LIMIT 1';
        
        $gogogo=$database->queryOne($sql,[$_SESSION['user']['Id']]);

		var_dump($gogogo);


		// ENREGISTRER DANS ORDERLINE

		var_dump($k);

        foreach ($k as $keach)
        {

        	$finalreceiptindividual= new Database();

		    $sql= 'INSERT INTO `OrderLine`(`QuantityOrdered`, `Meal_Id`, `Order_Id`, `PriceEach`) VALUES (?,?,?,?)';

			$values=(
				  	[
				  	$keach->quantite,
				  	$keach->id,
				  	$gogogo['Id'],
				  	$keach->prixsecure
				   	]);


			$finalreceiptindividual -> executeSql($sql, $values);



		}


	}



}





?>

