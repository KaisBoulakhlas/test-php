<?php 


class StudentDAO {

    public function __construct(private Database $db) 
    {
        $this->db = $db;
    }

    public function getStudents() : array
    {
        $query = "SELECT * FROM etudiants ORDER BY nom";
        $stmt = $this->db->getPDO()->query($query);

        $etudiants = array();

        while ($row = $stmt->fetch()) {
            $etudiant = new Student(
                $row['id'],
                $row['nom'],
                $row['prenom']
            );
            array_push($etudiants, $etudiant);
        }
        return $etudiants;
    }
}
?>