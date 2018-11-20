<?php

namespace App\Entity\Billing\Invoice;

use App\Entity\Billing\AbstractBilling;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Invoice
 * @package App\Entity\Billing\Invoice
 *
 * @ORM\Entity()
 * @ORM\Table(name="invoices")
 */
class Invoice extends AbstractBilling implements InvoiceInterface
{
    /**
     * @var string
     *
     * @ORM\Column(length=20)
     *
     * @JMS\Groups({"billing-read"})
     */
    private $status;

    /**
     * @var null|\DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @JMS\Groups({"billing-read", "billing-put"})
     */
    private $dueDate;

    /**
     * @var null|\DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @JMS\Groups({"billing-read", "billing-put"})
     */
    private $paymentDate;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Billing\Invoice\Detail", mappedBy="invoice")
     */
    private $details;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return InvoiceInterface
     */
    public function setStatus(string $status): InvoiceInterface
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return null|\DateTime
     */
    public function getDueDate(): ?\DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTime $dueDate
     * @return InvoiceInterface
     */
    public function setDueDate(\DateTime $dueDate): InvoiceInterface
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @return null|\DateTime
     */
    public function getPaymentDate(): ?\DateTime
    {
        return $this->paymentDate;
    }

    /**
     * @param \DateTime $paymentDate
     * @return InvoiceInterface
     */
    public function setPaymentDate(\DateTime $paymentDate): InvoiceInterface
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }
}