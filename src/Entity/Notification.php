<?php
namespace GiovanneDev\Asaas\Entity;

/**
 * Notification Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Notification extends \GiovanneDev\Asaas\Entity\AbstractEntity
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $customer;

    /**
     * @var string
     */
    public $event;

    /**
     * @var int
     */
    public $scheduleOffset;

    /**
     * @var bool
     */
    public $emailEnabledForProvider;

    /**
     * @var bool
     */
    public $smsEnabledForProvider;

    /**
     * @var bool
     */
    public $emailEnabledForCustomer;

    /**
     * @var bool
     */
    public $smsEnabledForCustomer;

    /**
     * @var bool
     */
    public $enabled;
}