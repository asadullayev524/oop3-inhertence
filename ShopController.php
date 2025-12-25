<?php

namespace frontend\controllers;

use frontend\models\Product;
use yii\web\Controller;
use yii\web\Response;
use Yii;

class ShopController extends Controller
{
    public $enableCsrfValidation = false;

    private $productClass;

    public function init()
    {
        parent::init();
        $this->productClass = new Product(); // Product obyektini yaratish
    }

    // Mahsulot qo'shish
    public function actionCreate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = json_decode(Yii::$app->request->getRawBody(), true);

        $name = $data['name'] ?? null;
        $category = $data['category'] ?? null;
        $price = $data['price'] ?? null;
        $quantity = $data['quantity'] ?? null;

        if (!$name || !$category || !$price || !$quantity) {
            return ['success' => false, 'message' => 'Barcha maydonlarni to‘ldiring!'];
        }

        $this->productClass->addProduct($name, $category, $price, $quantity);

        return [
            'success' => true,
            'message' => 'Mahsulot qo‘shildi!',
            'data' => $this->productClass->getProducts()
        ];
    }

    // Barcha mahsulotlarni olish
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->productClass->getProducts();
    }

    // Mahsulotni yangilash
    public function actionUpdate($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = json_decode(Yii::$app->request->getRawBody(), true);

        $name = $data['name'] ?? null;
        $category = $data['category'] ?? null;
        $price = $data['price'] ?? null;
        $quantity = $data['quantity'] ?? null;

        if ($this->productClass->updateProduct($id, $name, $category, $price, $quantity)) {
            return [
                'success' => true,
                'message' => 'Mahsulot yangilandi!',
                'data' => $this->productClass->getProducts()
            ];
        }

        return ['success' => false, 'message' => 'Yangilashda xatolik yoki mahsulot topilmadi!'];
    }

    // Mahsulotni o'chirish
    public function actionDelete($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if ($this->productClass->deleteProduct($id)) {
            return [
                'success' => true,
                'message' => 'Mahsulot o‘chirildi!',
                'data' => $this->productClass->getProducts()
            ];
        }

        return ['success' => false, 'message' => 'O‘chirishda xatolik yoki mahsulot topilmadi!'];
    }
}

