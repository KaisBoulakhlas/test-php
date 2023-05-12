<?php

class Grade
{

    public function __construct(private int $etudiant_id, private int $module_id, private float $note)
    {
    }
    
    public function getEtudiant(): int 
    {
        return $this->etudiant_id;
    }

    public function getModule(): int 
    {
        return $this->module_id;
    }

    public function getNote(): float 
    {
        return $this->note;
    }

}

?>