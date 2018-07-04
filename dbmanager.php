<?php
require_once('config.php');

//Fonction table user

function registerUser($data){
    $db = db_connect();
    if($db){
        $query = $db->prepare('INSERT INTO user (Name, Email, Password, Status, Actif) VALUES (:name, :email, :password, :status, :actif)');
        $result = $query->execute(array(':name'=> $data['name_creation'],
                                        ':email'=> $data['email_creation'],
                                        ':password'=> $data['password_creation'],
                                        ':status'=> 'client',
                                        ':actif' => 0));
        if($result){
            return $result;
        }
    return null;
    }
}

function getUsers() {
    $db = db_connect();
    if($db){
        $query = $db->prepare('SELECT * FROM user 
        ORDER BY Name ASC');

        $result = $query->execute();

        if($result){
            $users = $query->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
    }
    return null;
}

function deleteUser($id){
    $db = db_connect();
    if($db) {
        $query = $db->prepare('DELETE FROM user WHERE ID = :ID');
        $result = $query->execute(array(':ID'=>$id));
        if($result){
            return $result;
        }
    }
    return null;
}

function getUserById($id){
    $db = db_connect();
    if($db){
        $query = $db->prepare('SELECT * from user WHERE ID=:id');
        $result = $query->execute(array(':id'=>$id));
        if($result){
            return $query->fetch(PDO::FETCH_ASSOC);
        }
    }
    return null;
}

function updateUser($data){
    $db = db_connect();
    if($db){
        $query = $db->prepare('UPDATE user
                                SET Name = :name,
                                Email = :email,
                                Status = :status,
                                Actif = :actif
                                WHERE ID=:id');
        $result = $query->execute(array(':id'=> $data['ID'],
                                        ':name'=> $data['name'],
                                        ':email'=> $data['email'],
                                        ':status'=> $data['status'],
                                        ':actif'=> $data['actif']
                                        ));
        return $result;
    }
    return null;
}

//Fonction table pays

function getCountries() {
    $db = db_connect();
    if($db){
        $query = $db->prepare('SELECT * from pays ORDER BY name ASC');
        $result = $query->execute();
        if($result){
            $pays = $query->fetchAll(PDO::FETCH_ASSOC);
            return $pays;
        }
    }
    return null;
}

//Fonction table voyages

function getTripById($id){
    $trip = null;
    $db = db_connect();
    if($db){
        $query = $db->prepare('SELECT * from voyages WHERE ID=:id');
        $result = $query->execute(array(':id'=>$id));
        if($result){
            return $query->fetch(PDO::FETCH_ASSOC);
        }
    }
    return $trip;
}

function getTrips($full = true) {
    $db = db_connect();
    $voyages = null;
    if($db){
        if($full) {
            $query = $db->prepare('SELECT * from voyages ORDER BY Date_debut DESC');
        }
        else {
            $query = $db->prepare('SELECT voyages.ID, Titre, Pays, Date_debut, Date_fin, Description, Prix, name AS name_country
            FROM voyages LEFT JOIN pays ON voyages.Pays = pays.ID 
            ORDER BY Date_debut DESC');
        }
        $result = $query->execute();
        if($result){
            $voyages = $query->fetchAll(PDO::FETCH_ASSOC);
            return $voyages;
        }
    }
    return $voyages;
}

function updateTrip($id, $data){
    $db = db_connect();
    if($db){
        $query = $db->prepare('UPDATE voyages
                                SET Pays = :pays,
                                Date_debut = :date_debut,
                                Date_fin = :date_fin,
                                Titre = :titre,
                                Description = :description,
                                Prix = :prix
                                WHERE ID=:id');
        $result = $query->execute(array(':id'=> $id,
                                        ':pays'=> $data['Pays'],
                                        ':date_debut'=> $data['Date_debut'],
                                        ':date_fin'=> $data['Date_fin'],
                                        ':titre'=> $data['Titre'],
                                        ':description'=> $data['Description'],
                                        ':prix'=> $data['Prix']));
        return $result;
    }
    return null;
}

function deleteTrip($id){
    $db = db_connect();
    if($db) {
        $query = $db->prepare('DELETE FROM voyages WHERE ID = :ID');
        $result = $query->execute(array(':ID'=>$id));
        if($result){
            return $result;
        }
    }
    return null;
}

//Fonction table picture

function addPicture($trip_id, $path){
    $db = db_connect();
    if($db){
        $query = $db->prepare('INSERT INTO picture (trip_id, path) VALUES (:trip_id, :path)');
        $result = $query->execute(array(':trip_id' => $trip_id,
                                ':path' => $path));
        if($result){
            return $result;
        }
    }
    return null;
}

function getPicturesByTrip($trip_id) {
    $db = db_connect();
    if($db){
        $query = $db->prepare('SELECT * from picture WHERE trip_id = :trip_id');
        $result = $query->execute(array(':trip_id'=>$trip_id));
        if($result){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    return null;
}


function searchTrip($criteria){

    $db = db_connect();

    if($db){
        $sql = 'SELECT voyages.ID, Pays, Date_debut, Date_fin, Titre, Description, Prix, name AS name_country from voyages 
                LEFT JOIN pays ON voyages.Pays = pays.ID 
                WHERE voyages.ID > 0 '; 
                //le champ ID se retrouve dans les deux tables jointes, il faut lever l'ambiguité entre utlisant table.id

        if($criteria['pays'] != null){
                $sql .= 'AND Pays = '. $criteria['pays'] .' ';
        }
        if($criteria['date_debut'] != null){
            $sql .= 'AND Date_debut >= \''. $criteria['date_debut'] .'\' '; 
            //Les recherches de dates SQL EXIGENT les singles quotes autour de la valeur de recherche
        }
        if($criteria['date_fin'] != null){
            $sql .= 'AND Date_fin <= \''. $criteria['date_fin'] .'\' '; 
        }
        if($criteria['prix'] != null){
            $sql .= 'AND Prix <= '. $criteria['prix'] .' ';
        }
        $query = $db->prepare($sql);
    
        $result = $query->execute();
        if($result) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

}
?>