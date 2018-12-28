<?php



//models/MealMode.class.php

//models/MealMode.class.php

var_dump($_POST);

class LoginModel {


// session_start(); 
	public function ListAllUsers($email, $password)
	{

		$users= new Database();

		$sql= 'SELECT * FROM User WHERE Email=?';

		$values=[$email];

		$user = $users -> queryOne($sql,$values);

		var_dump($user);


		if ($this->verifyPassword($password, $user['Password']) ) {
		    
		    	$_SESSION['user']['password'] = $user['Password'];
		        $_SESSION['user']['email'] = $user['Email']; 
		        $_SESSION['user']['FirstName'] = $user['FirstName'];  
		        $_SESSION['user']['LastName'] = $user['LastName'];  
		        $_SESSION['user']['Id'] = $user['Id']; 
		        $_SESSION['user']['Address'] = $user['Address'];  
		        $_SESSION['user']['ZipCode'] = $user['ZipCode'];  
		        $_SESSION['user']['City'] = $user['City'];  		             
		    

		    }
	}



    public function verifyPassword($password, $hashedPassword)
	{
	        // Si le mot de passe en clair est le même que la version hachée alors renvoie true.
	        return crypt($password, $hashedPassword) == $hashedPassword;
	}

	

	

}







?>

