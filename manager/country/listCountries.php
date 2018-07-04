<?php 
// $db= db_connect();
// if($db) {
//     $query = $db->prepare('SELECT * from pays ORDER BY name ASC');
//     $result = $query->execute();

//     if($result){
//         $pays = $query->fetchAll(PDO::FETCH_ASSOC);
//     }

require_once('dbmanager.php');

$pays = getCountries();

?>

<div class="listeCountries center hide">
        <h2>Listes des pays</h2>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <?php foreach($pays as $element): ?>
                <tr>
                    <td><?php echo $element['name'] ?></td>
                    <td>
                        <a href="./manager/country/edit.php?ID=<?php echo $element['ID'];?>" class="btn btn-small btn-primary">Editer</a>
                        <a href="./manager/country/delete.php?ID=<?php echo $element['ID'];?>" class="btn btn-small btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
</div>