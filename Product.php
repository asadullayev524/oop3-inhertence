<?php

namespace frontend\models;

class Product
{
    private $products = [];

    // Mahsulot qo'shish
    public function addProduct($name, $category, $price, $quantity)
    {
        $this->products[] = [
            'name' => $name,
            'category' => $category,
            'price' => (float)$price,
            'quantity' => (int)$quantity
        ];
    }

    // Barcha mahsulotlarni olish
    public function getProducts()
    {
        return $this->products;
    }

    // Mahsulotni yangilash
    public function updateProduct($index, $name, $category, $price, $quantity)
    {
        if (!isset($this->products[$index])) {
            return false;
        }

        $this->products[$index] = [
            'name' => $name,
            'category' => $category,
            'price' => (float)$price,
            'quantity' => (int)$quantity
        ];

        return true;
    }

    // Mahsulotni o'chirish
    public function deleteProduct($index)
    {
        if (!isset($this->products[$index])) {
            return false;
        }

        unset($this->products[$index]);
        return true;
    }
}

