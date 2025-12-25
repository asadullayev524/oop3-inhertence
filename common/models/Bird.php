<?php

namespace common\models;

/**
 * Bird - Animal sinfidan meros oladi
 */
class Bird extends Animal
{
    // Qushga xos metod
    public function fly(): string
    {
        return $this->name . " is flying";
    }

    // Parent metodni override qilish
    public function makeSound(): string
    {
        return "Bird chirps";
    }
}
