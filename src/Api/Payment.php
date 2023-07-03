<?php
namespace GiovanneDev\Asaas\Api;

// Entities
use GiovanneDev\Asaas\Entity\Payment as PaymentEntity;
use GiovanneDev\Asaas\Entity\PaymentSlip as PaymentSlipEntity;
use GiovanneDev\Asaas\Entity\PixSlip as PixSlipEntity;

/**
 * Payment API Endpoint
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class Payment extends \GiovanneDev\Asaas\Api\AbstractApi
{
    /**
     * Get all payments
     *
     * @param   array  $filters  (optional) Filters Array
     * @return  array  Payments Array
     */
    public function getAll(array $filters = [])
    {
        $payments = $this->adapter->get(sprintf('%s/payments?%s', $this->endpoint, http_build_query($filters)));

        $payments = json_decode($payments);

        $this->extractMeta($payments);

        return array_map(function($payment)
        {
            return new PaymentEntity($payment);
        }, $payments->data);
    }

    /**
     * Get Payment By Id
     *
     * @param   int  $id  Payment Id
     * @return  PaymentEntity
     */
    public function getById($id)
    {
        $payment = $this->adapter->get(sprintf('%s/payments/%s', $this->endpoint, $id));

        $payment = json_decode($payment);

        return new PaymentEntity($payment);
    }

    /**
     * Get Payments By Customer Id
     *
     * @param   int    $customerId  Customer Id
     * @param   array  $filters     (optional) Filters Array
     * @return  PaymentEntity
     */
    public function getByCustomer($customerId, array $filters = [])
    {
        $payments = $this->adapter->get(sprintf('%s/customers/%s/payments?%s', $this->endpoint, $customerId, http_build_query($filters)));

        $payments = json_decode($payments);

        $this->extractMeta($payments);

        return array_map(function($payment)
        {
            return new PaymentEntity($payment);
        }, $payments->data);
    }

    /**
     * Get Payments By Subscription Id
     *
     * @param   int    $subscriptionId  Subscription Id
     * @param   array  $filters         (optional) Filters Array
     * @return  PaymentEntity
     */
    public function getBySubscription($subscriptionId)
    {
        $payments = $this->adapter->get(sprintf('%s/subscriptions/%s/payments?%s', $this->endpoint, $subscriptionId, http_build_query($filters)));

        $payments = json_decode($payments);

        $this->extractMeta($payments);

        return array_map(function($payment)
        {
            return new PaymentEntity($payment);
        }, $payments->data);
    }

    /**
     * Create New Payment
     *
     * @param   array  $data  Payment Data
     * @return  PaymentEntity
     */
    public function create(array $data)
    {
        $payment = $this->adapter->post(sprintf('%s/payments', $this->endpoint), $data);

        $payment = json_decode($payment);

        return new PaymentEntity($payment);
    }

    /**
     * Get the Payment Slip Details
     *
     * @param   array  $id Payment ID
     * @return  PaymentSlipEntity
     */
    public function getPaymentSlipDetails($id)
    {
        $payment = $this->adapter->get(sprintf('%s/payments/%s', $this->endpoint, $id));

        $payment = json_decode($payment);

        if($payment->billingType == 'BOLETO') {
            $slipDetails = $this->adapter->get(sprintf('%s/payments/%s/identificationField', $this->endpoint, $id));
            $slipDetails = json_decode($slipDetails);
            return new PaymentSlipEntity($slipDetails);
        }
    }

    /**
     * Get Pix QR Code Info
     *
     * @param   array  $id Payment ID
     * @return  PixSlipEntity
     */

    public function getPixSlipInfo($id)
    {
        $payment = $this->adapter->get(sprintf('%s/payments/%s', $this->endpoint, $id));
        $payment = json_decode($payment);

        if($payment->billingType == 'PIX') {
            $pixDetails = $this->adapter->get(sprintf('%s/payments/%s/pixQrCode', $this->endpoint, $id));
            $pixDetails = json_decode($pixDetails);
            return new PixSlipEntity($pixDetails);
        }
    }

    /**
     * Update Payment By Id
     *
     * @param   string  $id    Payment Id
     * @param   array   $data  Payment Data
     * @return  PaymentEntity
     */
    public function update($id, array $data)
    {
        $payment = $this->adapter->post(sprintf('%s/payments/%s', $this->endpoint, $id), $data);

        $payment = json_decode($payment);

        return new PaymentEntity($payment);
    }

    /**
     * Delete Payment By Id
     *
     * @param  string|int  $id  Payment Id
     */
    public function delete($id)
    {
        $this->adapter->delete(sprintf('%s/payments/%s', $this->endpoint, $id));
    }
}