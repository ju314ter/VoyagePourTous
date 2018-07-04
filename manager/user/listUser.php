<?php 
require_once('dbmanager.php');

$users = getUsers();

?>

<div class="listeUser hide center">
        <h2>Liste des utilisateurs</h2>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actif</th>
                <th>Action</th>
            </tr>
            <?php foreach($users as $element): ?>
                <tr>
                    <td><?php echo $element['Name'] ?></td>
                    <td><?php echo $element['Email'] ?></td>
                    <td><?php echo $element['Status'] ?></td>
                    <td><?php echo $element['Actif'] ?></td>
                    <td>
                        <a href="./manager/user/editUser.php?ID=<?php echo $element['ID'];?>" class="btn btn-small btn-primary">Editer</a>
                        <a href="./manager/user/deleteUser.php?ID=<?php echo $element['ID'];?>" class="btn btn-small btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
</div>