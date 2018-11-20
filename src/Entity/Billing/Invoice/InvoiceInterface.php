<?php

namespace App\Entity\Billing\Invoice;

interface InvoiceInterface
{
    /**
     * @return null|\DateTime
     */
    public function getDueDate(): ?\DateTime;

    /**
     * @param \DateTime $dueDate
     * @return InvoiceInterface
     */
    public function setDueDate(\DateTime $dueDate): InvoiceInterface;

    /**
     * @return null|\DateTime
     */
    public function getPaymentDate(): ?\DateTime;

    /**
     * @param \DateTime $paymentDate
     * @return InvoiceInterface
     */
    public function setPaymentDate(\DateTime $paymentDate): InvoiceInterface;
}