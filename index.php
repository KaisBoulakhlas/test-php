<?php 
require_once("./config/database.php");
require_once("./class/Student.php");
require_once("./class/Module.php");
require_once("./class/Grade.php");
require_once("./dao/StudentDAO.php");
require_once("./dao/ModuleDAO.php");
require_once("./dao/GradeDAO.php");

$db = new Database();
$studentsDAO = new StudentDAO($db);
$students = $studentsDAO->getStudents();

$modulesDAO = new ModuleDAO($db);
$modules = $modulesDAO->getModules();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $gradeDAO = new GradeDAO($db);
    $etudiant = stripslashes(trim(htmlspecialchars($_POST['etudiant'])));
    $module = stripslashes(trim(htmlspecialchars($_POST['module'])));
    $note = stripslashes(trim(htmlspecialchars($_POST['note'])));

    $createNote = $gradeDAO->create(new Grade($etudiant, $module, $note));
    if($createNote) {
        echo "La note a été ajoutée";
    } else {
        echo "Erreur lors de l'ajout de la note";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulaire de saisie des notes</title>
</head>
<body>
	<h1>Formulaire de saisie des notes</h1>
	<form action="#" method="post" id="form">
		<label for="etudiant">Étudiant :</label>
		<select name="etudiant" id="etudiant">
            <?php foreach($students as $student): ?>
                <option value=<?= $student->getId() ?>><?= $student->getLastName() . ' ' . $student->getFirstName() ?></option> 
            <?php endforeach; ?>
		</select><br>

		<label for="module">Module :</label>
        <select name="module" id="module">
            <?php foreach($modules as $module): ?>
                <option value=<?= $module->getId() ?>><?= $module->getName() ?></option> 
            <?php endforeach; ?>
		</select><br>

		<label for="note">Note :</label>
		<input type="number" step="0.01" name="note" id="note" class="note"><br>

		<button type="submit" name="register" id="register">Enregistrer la note</button>
	</form>
</body>
<script>
        const formInput = document.querySelector("#form");
        let noteInput = document.querySelector("#note");
        formInput.addEventListener("submit", (event) => {
            let note = parseFloat(noteInput.value);
            return isNaN(note) || note < 0 || note > 20 ?  (event.preventDefault(), alert("Veuillez saisir une note valide (comprise entre 0 et 20)")) : null;
        })
	</script>
</html>

