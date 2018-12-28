<?php

class ReceiptController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */





        // $mealModel = new MealModel();

        // $meals =$mealModel->listOne($_GET['id']);


        // echo json_encode($meals);
        // exit();






    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */




        $orders = new ReceiptModel() ;

        $Orders =$orders->displayOrder();

        var_dump($Orders);



    
    }
}

?>