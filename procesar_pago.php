<?php
// Cargar la biblioteca SDK de PayPal
require 'path/to/paypal/autoload.php';

$amount = $_GET['amount']; // Monto recibido por GET
$paymentUrl = '';

// Crear la solicitud de pago
$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'CLIENT_ID',     // Reemplaza con tu Client ID de PayPal
        'CLIENT_SECRET'  // Reemplaza con tu Client Secret de PayPal
    )
);

$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod("paypal");

$amountObj = new \PayPal\Api\Amount();
$amountObj->setTotal($amount);
$amountObj->setCurrency("USD");

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amountObj);
$transaction->setDescription("Pago de carrito de compras");

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("http://tusitio.com/pago_confirmado.php")
    ->setCancelUrl("http://tusitio.com/pago_cancelado.php");

$payment = new \PayPal\Api\Payment();
$payment->setIntent("sale")
    ->setPayer($payer)
    ->setTransactions([$transaction])
    ->setRedirectUrls($redirectUrls);

try {
    $payment->create($paypal);
    $paymentUrl = $payment->getApprovalLink();
    header("Location: " . $paymentUrl);
} catch (Exception $ex) {
    echo "Error al crear el pago: " . $ex->getMessage();
}
?>
