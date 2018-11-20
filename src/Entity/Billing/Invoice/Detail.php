<?php

namespace App\Entity\Billing\Invoice;

use App\Entity\Billing\AbstractBillingDetails;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Detail
 * @package App\Entity\Billing\Invoice
 *
 * @ORM\Entity()
 * @ORM\Table(name="invoice_details")
 */
class Detail extends AbstractBillingDetails implements DetailInterface
{
    /**
     * @var InvoiceInterface
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Billing\Invoice\Invoice", inversedBy="details")
     */
    private $invoice;

    /**
     * @return InvoiceInterface
     */
    public function getInvoice(): InvoiceInterface
    {
        return $this->invoice;
    }

    /**
     * @param InvoiceInterface $invoice
     * @return DetailInterface
     */
    public function setInvoice(InvoiceInterface $invoice): DetailInterface
    {
        $this->invoice = $invoice;
        return $this;
    }
}