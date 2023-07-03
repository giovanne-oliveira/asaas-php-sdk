<?php
namespace GiovanneDev\Asaas\Entity;

/**
 * Payment Slip Entity
 *
 * @author Giovanne Oliveira <giovanne@giovanne.dev>
 */
final class PixSlip extends \GiovanneDev\Asaas\Entity\AbstractEntity
{
    public $encodedImage;
    public $payload;
    public $expirationDate;
}