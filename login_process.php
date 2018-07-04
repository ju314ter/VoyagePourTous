<?php 
//Processer le login

//analyser la superglobale $_POST
if(isset($_POST['email']) && isset($_POST['password'])) {
    //interroger la DB
    try {$db = new PDO('mysql:host=localhost;dbname=voyageproject', 'root', '');

        // 1. Preparation des variables
        $password = $_POST['password'];
        $email = $_POST['email'];

        // 2. préparation de la requête
        $user = $db->prepare('SELECT * from user WHERE email =:email && password=:password');

        // 3. Binding (association des placeholders avec les variables)
        $user->bindParam(':email', $email);
        $user->bindParam(':password', $password);

        // 4. Execution de la requête
        $user->execute();

        // 5. Fetch (récupration sous forme de tableau associatif des données SQL => PHP)

        $listUsers = $user->fetch(PDO::FETCH_ASSOC); 
        //PDO::FETCH_NUM renvoie le tableau sous forme numerique, assoc renvoie sous forme associative
        //fetch renvoie le premier utilisateur trouvé, fetchAll renvoie un tableau de tout les users trouvés (ici un seul possible)

        if($listUsers) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['Name'] =  $listUsers['Name'];
            if ($listUsers['Status'] == "admin"){
                $_SESSION['isAdmin'] = true;
            }
            header('location: index.php');
        } else {
            echo '</br><div class="alert alert-danger"><p>Impossible de se connecter, vérifiez votre mot de passe ou adresse mail</p></div>';
        }
        
        // (sizeof($listUsers)=1) ? echo 'Login successfull' : echo 'Impossible de se connecter';


    } catch(PDOException $e) { echo 'problème ' . $e->getMessage();}
    // echo gettype($db);
    // var_dump($db);
}
?>