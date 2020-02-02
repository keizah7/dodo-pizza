<?php


namespace App\Services;

class Paysera
{
    private $config;

    /**
     * Paysera constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function pay($email, $amount, $orderId)
    {
        try {
            $request = WebToPay::redirectToPayment(array(
                'projectid' => $this->config['projectid'],
                'sign_password' => $this->config['sign_password'],
                'orderid' => $orderId,
                'amount' => ($amount * 100),
                'currency' => 'EUR',
                'country' => 'LT',
                'accepturl' => $this->config['accepturl'],
                'cancelurl' => $this->config['cancelurl'],
                'callbackurl' => $this->config['callbackurl'],
                'p_email' => $email,
                'test' => $this->config['test'],
            ));
        } catch (WebToPayException $e) {
            die('Mokėjimas nepavyko');
        }
    }

    public function getPayment()
    {
        try {
            $response = WebToPay::checkResponse($_GET, array(
                'projectid' => $this->config['projectid'],
                'sign_password' => $this->config['sign_password'],
            ));

            $orderId = $response['orderid'];
            $amount = ($response['amount'] / 100);
            $currency = $response['currency'];
            $status = $response['status']; // gaunam 0, nepatvirtintas

            //@todo: check, if order with $orderId is already approved (callback can be repeated several times)
            //@todo: check, if order amount and currency matches $amount and $currency
            //@todo: confirm order

            //statusai
            //0 - apmokėjimas neįvyko
            //1 - apmokėta sėkmingai
            //2 - mokėjimo nurodymas priimtas, bet dar neįvykdytas(šis statusas negarantuoja, kad mokėjimas bus įvykdytas)
            //3 - papildoma mokėjimo informacija


            return [
                'id' => $orderId,
                'status' => $status,
                'amount' => $amount,
                'currency' => $currency,
            ];
        } catch (Exception $e) {
            echo get_class($e) . ': ' . $e->getMessage();
        }
    }
}
