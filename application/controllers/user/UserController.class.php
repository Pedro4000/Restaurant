<?php 
class UserController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */



       
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */

        if (empty($_POST) == false) {
        
        
        try
            {	

    		$createUser = new UserModel ();

    		$user = $createUser -> SaveUser();

            $http->redirectTo('/');
            }
        
        catch(DomainException $exception) {
            echo 'la requête pdo a merdé';



        }
    }

    }

}

?>


<!-- /*
$i;






  $hashPassword = hashPassword($_POST['Password']);

  var_dump($hashPassword);


    $query = $pdo->prepare
    (
        ' INSERT INTO
                Users
                (FirstName, LastName, Email, Password)
            VALUES
                (?, ?, ?, ?)'
    );

  $query->execute([$_POST['FirstName'], $_POST['LastName'], $_POST['Email'], $hashPassword]);



}

*/ -->


