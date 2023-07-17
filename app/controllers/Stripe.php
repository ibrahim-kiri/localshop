<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\Order;

/**
 * stripe class
 */
class Stripe
{
	use MainController;

	public function index()
	{
		$order = new Order;

        // webhook.php
        //
        // Use this sample code to handle webhook events in your integration.
        //
        // 1) Paste this code into a new file (webhook.php)
        //
        // 2) Install dependencies
        //   composer require stripe/stripe-php
        //
        // 3) Run the server on http://localhost:4242
        //   php -S localhost:4242


        require '../app/models/stripe-php-master/init.php';

        // The library needs to be configured with your account's secret key.
        // Ensure the key is kept out of any version control system you might be using.
        $stripe = new \Stripe\StripeClient('sk_test_...');

        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = HK;

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
        } catch(\UnexpectedValueException $e) {
        // Invalid payload
        http_response_code(400);
        exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        http_response_code(400);
        exit();
        }

        // Handle the event
        switch ($event->type) {
        case 'checkout.session.async_payment_failed':
            $session = $event->data->object;
        case 'checkout.session.async_payment_succeeded':
            $session = $event->data->object;
        case 'checkout.session.completed':
            $session = $event->data->object;

            //update paid status
            $query = "update orders set paid = 1, raw = :payload where user_id = :user_id && id = :id limit 1";
            $user_id = $session->metadata->user_id;
            $id = $session->metadata->id;

            $order->query($query,['user_id'=>$user_id,'id'=>$id,'payload'=>$payload]);
            
        case 'checkout.session.expired':
            $session = $event->data->object;
        // ... handle other event types
        default:
            echo 'Received unknown event type ' . $event->type;
        }

        http_response_code(200);

    }

}
