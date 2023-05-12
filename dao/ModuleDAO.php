<?php 


class ModuleDAO {

    public function __construct(private Database $db) 
    {
        $this->db = $db;
    }

    public function getModules() : array
    {
        $query = "SELECT * FROM modules ORDER BY nom";
        $stmt = $this->db->getPDO()->query($query);

        $modules = array();

        while ($row = $stmt->fetch()) {
            $module = new Module(
                $row['id'],
                $row['nom'],
                $row['coefficient']
            );
            array_push($modules, $module);
        }
        return $modules;
    }
}
?>