<?php

namespace App\Entity\Billing\Invoice;

interface DetailInterface
{
    /**
     * @return InvoiceInterface
     */
    public function getInvoice(): InvoiceInterface;

    /**
     * @param InvoiceInterface $invoice
     * @return DetailInterface
     */
    public function setInvoice(InvoiceInterface $invoice): DetailInterface;
}