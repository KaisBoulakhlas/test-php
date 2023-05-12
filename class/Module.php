<?php

class Module
{
    public function __construct(private int $id, private string $name, private int $coefficient)
    {

    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function getCoefficient(): int 
    {
        return $this->coefficient;
    }
}

?>