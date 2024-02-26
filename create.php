<?php
session_start();

if (!isset($_SESSION['loggedin'])) {

    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'clients';

// conexion a la base de datos

$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {

    // si se encuentra error en la conexión

    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

$stmt = $conexion->prepare('SELECT name, price FROM plans WHERE id = "'.$id.'"');
$stmt->execute();
$stmt->bind_result($planName, $planPrice);
$stmt->fetch();
$stmt->close();


require_once 'vendor/autoload.php';
require_once 'secrets.php';

$stripe = new \Stripe\StripeClient('sk_test_51OjVGGI5LQmGdx2N1D9o82IKpHIFS28GGz23b2YsHeHJbT81TOIHqaSG2aKmO5TNtRdz3h0BjZDwEuAV0JKXxGf8007NlSzXIw');

function calculateOrderAmount(array $items): int {
    // Replace this constant with a calculation of the order's amount
    // Calculate the order total on the server to prevent
    // people from directly manipulating the amount on the client
    return 2000;
}

header('Content-Type: application/json');

try {
    // retrieve JSON from POST body
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);
    $price = $planPrice;

    // Create a PaymentIntent with amount and currency
    $paymentIntent = $stripe->paymentIntents->create([
        'amount' => $price,//calculateOrderAmount($jsonObj->items),
        'currency' => 'mxn',
        // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    $output = [
      'clientSecret' => $paymentIntent->client_secret,
      'price' => $planPrice,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}