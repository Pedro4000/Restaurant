<?php



//models/MealMode.class.php

//models/MealMode.class.php

class UserModel {


	public function SaveUser(){

		$birthDate = $_POST['birthYear'].'-'.$_POST['birthMonth'].'-'.$_POST['birthDay'];

		$hashPassword = $this->hashPassword($_POST['password']);


		$user= new Database();

		$sql= 'INSERT INTO `User`(`FirstName`, `LastName`, `Email`, `Password`, `BirthDate`, `Address`, `City`, `ZipCode`, `Country`, `Phone`, `CreationTimestamp`, `LastLoginTimestamp`) VALUES (?,?,?,?,?,?,?,?,?,?,NOW(),"1993-10-02 10:55:03")';

		  $values=(
		  	[
		  	$_POST['firstName'],
		   	$_POST['lastName'], 
		   	$_POST['email'], 
		   	$hashPassword , 
		   	$birthDate, 
		   	$_POST['address'], 
		   	$_POST['city'], 
		   	$_POST['zipCode'], 
		   	"France", 
		   	$_POST['phone']
		   	]);


		return $user -> executeSql($sql, $values);


	}

function hashPassword($password)
    {
       
        $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

        // Voir la documentation de crypt() : http://devdocs.io/php/function.crypt
        return crypt($password, $salt);
    }

}


?>

