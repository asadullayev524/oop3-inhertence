<?php

namespace common\models;

/**
 * Animal - asosiy (parent) sinf
 * Umumiy xususiyat va metodlarga ega
 */
class Animal
{
    // Hayvon nomi
    protected string $name;

    // Konstruktor — obyekt yaratilganda ishga tushadi
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // Hayvon ovoz chiqaradi
    public function makeSound(): string
    {
        return "Animal makes sound";
    }
}
////rjfrrihfhr