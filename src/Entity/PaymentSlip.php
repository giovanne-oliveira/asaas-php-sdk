<?php
namespace GiovanneDev\Asaas\Entity;

/**
 * Payment Slip Entity
 *
 * @author Giovanne Oliveira <giovanne@giovanne.dev>
 */
final class PaymentSlip extends \GiovanneDev\Asaas\Entity\AbstractEntity
{
    public $identificationField;
    public $nossoNumero;
    public $barCode;
}