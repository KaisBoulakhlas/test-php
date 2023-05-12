<?php 

require_once("./config/database.php");
require_once("./dao/GradeDAO.php");

$db = new Database();
$gradeDAO = new GradeDAO($db);
$moyennes = $gradeDAO->getMoyennes();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des moyennes</title>
</head>
<body>
	<table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Moyenne</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($moyennes as $moyenne): ?>
            <tr>
                <td><?= $moyenne['nom'] ?></td>
                <td><?= $moyenne['prenom'] ?></td>
                <td><?= $moyenne['moyenne'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>