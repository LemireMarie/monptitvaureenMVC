<?php
namespace controllers;

require_once('../vendor/autoload.php');
require_once('./models/stripeModel.php');

use models\StripeModel;

class StripeController
{
    private \Stripe\StripeClient $stripe;
    private $model;

    public function __construct(){
        $this->stripe = new \Stripe\StripeClient("sk_test_51OA6OtHKJAYabKHM3IMgjh69E0a4w8SboNvfyizi8VRL1QfljxHdhj8UrYKJ7i9eAG6oBwr6uw9eJUyc6Zqu4sqd00zCVkJOp4");
        $this->model = new StripeModel();
    }

    public function intent(){
        header('Content-Type: application/json');
        try {
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);
            
            $paymentIntent = $this->stripe->paymentIntents->create([
                'amount' => $this->calculateOrderAmount($jsonObj->items),
                'currency' => 'eur',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            echo json_encode($output);
        } catch (\Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    private function calculateOrderAmount(array $items): int {
        $amount = 0;
        foreach ($items as $item) {
            $res = $this->model->findById("products", $item->id);
            $amount += $res["prix"] * 100;
        }
        return $amount;
    }
}

// {
//     "items": [
//         {"id": 1},
//         {"id": 2},
//         {"id": 4},
//         {"id": 16},
//     ]
// }