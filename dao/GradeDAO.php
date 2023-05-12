<?php 


class GradeDAO {

    public function __construct(private Database $db) 
    {
        $this->db = $db;
    }

    public function create(Grade $note) : bool
    {
        $query = "INSERT INTO notes (etudiant_id, module_id, note) VALUES (:etudiant_id, :module_id, :note)";
        $stmt = $this->db->getPDO()->prepare($query);
        $stmt->bindValue(':etudiant_id', $note->getEtudiant(), PDO::PARAM_INT);
        $stmt->bindValue(':module_id', $note->getModule(), PDO::PARAM_INT);
        $stmt->bindValue(':note', $note->getNote(), PDO::PARAM_STR);
        if($stmt->execute()) {
            return true;
        } else { return false; }
    }

    public function getMoyennes() : array
    {
        $query = "SELECT e.nom, e.prenom, ROUND(AVG(n.note * m.coefficient) / AVG(m.coefficient), 2) AS moyenne 
                  FROM etudiants e 
                  INNER JOIN notes n 
                  ON n.etudiant_id = e.id 
                  INNER JOIN modules m
                  ON m.id = n.module_id
                  GROUP BY e.id 
                  ORDER BY moyenne DESC;";
                  
        $stmt = $this->db->getPDO()->query($query);

        $moyennes = array();

        while ($row = $stmt->fetch()) {
            array_push($moyennes, $row);
        }

        return $moyennes;
    }
}
?>
