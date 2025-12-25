<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use common\models\Bird;

/**
 * OOP Inheritance API Controller
 * Database va login ishlatilmaydi
 */
class Oop3InheritanceController extends Controller
{
    // 🔥 Postman uchun CSRF o‘chiriladi
    public $enableCsrfValidation = false;

    /**
     * Authentication / authorization o‘chiriladi
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * Faqat bitta API endpoint
     * POST orqali ma'lumot qabul qiladi
     */
    public function actionAddExample()
    {
        // JSON formatda javob qaytarish
        Yii::$app->response->format = Response::FORMAT_JSON;

        // POST orqali kelgan ma'lumot
        $name = Yii::$app->request->post('name', 'Unknown bird');

        // Bird obyektini yaratish
        $bird = new Bird($name);

        // Natijani qaytarish
        return [
            'status' => true,
            'animal' => $name,
            'sound'  => $bird->makeSound(),
            'action' => $bird->fly(),
        ];
    }
}
