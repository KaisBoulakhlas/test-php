<?php

class Student
{
    public function __construct(private int $id, private string $firstname, private string $lastname)
    {

    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getFirstName(): string 
    {
        return $this->firstname;
    }

    public function getLastName(): string 
    {
        return $this->lastname;
    }
}

?>