<?php
namespace GiovanneDev\Asaas\Entity;

/**
 * Payment Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Payment extends \GiovanneDev\Asaas\Entity\AbstractEntity
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
    public $subscription;

    /**
     * @var string
     */
    public $billingType;

    /**
     * @var float
     */
    public $value;

    /**
     * @var float
     */
    public $netValue;

    /**
     * @var float
     */
    public $originalValue;

    /**
     * @var float
     */
    public $interestValue;

    /**
     * @var float
     */
    public $grossValue;

    /**
     * @var string
     */
    public $dueDate;

    /**
     * @var string
     */
    public $originalDueDate;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $nossoNumero;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $invoiceNumber;

    /**
     * @var string
     */
    public $invoiceUrl;

    /**
     * @var string
     */
    public $bankSlipUrl;

    /**
     * @var string
     */
    public $pixTransaction;

    /**
     * @var string
     */
    public $pixQrCodeId;

    /**
     * @var string
     */
    public $transactionReceiptUrl;

    /**
     * @var int
     */
    public $installmentCount;

    /**
     * @var float
     */
    public $installmentValue;

    /**
     * @var array
     */

     public $creditCard;

    /**
     * @var bool
     */
    public $canDelete;

    /**
     * @var string
     */
    public $cannotBeDeletedReason;

    /**
     * @var bool
     */
    public $canEdit;

    /**
     * @var string
     */
    public $cannotEditReason;

    /**
     * @param  string  $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = static::convertDateTime($dueDate);
    }
}