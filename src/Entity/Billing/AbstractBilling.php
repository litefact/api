<?php

namespace App\Entity\Billing;

use Api\Entity\BlameableTrait;
use Api\Entity\EntityTrait;
use App\Entity\Customer\AddressInterface;
use App\Entity\Customer\CustomerInterface;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Swagger\Annotations as SWG;
use JMS\Serializer\Annotation as JMS;

/**
 * Class BillingAbstract
 * @package App\Entity\Billing
 *
 * @ORM\MappedSuperclass()
 */
abstract class AbstractBilling implements BillingInterface
{
    use EntityTrait;
    use BlameableTrait;

    /**
     * @var string
     *
     * @ORM\Column(length=20)
     *
     * @JMS\Groups({"billing-read"})
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(length=200)
     *
     * @Assert\NotBlank()
     *
     * @JMS\Groups({"billing-read", "billing-write"})
     */
    private $name;

    /**
     * @var CustomerInterface
     *
     * @SWG\Property(
     *     description="The customer of the invoice.",
     *     type="string"
     * )
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer\Customer")
     *
     * @Assert\NotNull()
     *
     * @JMS\Groups({"billing-read", "billing-write"})
     */
    private $customer;

    /**
     * @var AddressInterface
     *
     * @SWG\Property(
     *     description="The billing address of the invoice.",
     *     type="string"
     * )
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer\Address")
     *
     * @Assert\NotNull()
     *
     * @JMS\Groups({"billing-read", "billing-write"})
     */
    private $billingAddress;

    /**
     * @var AddressInterface
     *
     * @SWG\Property(
     *     description="The delivery address of the invoice.",
     *     type="string"
     * )
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer\Address")
     * @ORM\JoinColumn(nullable=true)
     *
     * @JMS\Groups({"billing-read", "billing-write"})
     */
    private $deliveryAddress;

    /**
     * @var string
     *
     * @ORM\Column(length=200, nullable=true)
     *
     * @JMS\Groups({"billing-read", "billing-write"})
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     *
     * @JMS\Groups({"billing-read", "billing-write"})
     */
    private $comment;

    /**
     * @var ArrayCollection
     */
    private $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return BillingInterface
     */
    public function setNumber(string $number): BillingInterface
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BillingInterface
     */
    public function setName(string $name): BillingInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return CustomerInterface
     */
    public function getCustomer(): CustomerInterface
    {
        return $this->customer;
    }

    /**
     * @param CustomerInterface $customer
     * @return BillingInterface
     */
    public function setCustomer(CustomerInterface $customer): BillingInterface
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return AddressInterface
     */
    public function getBillingAddress(): AddressInterface
    {
        return $this->billingAddress;
    }

    /**
     * @param AddressInterface $address
     * @return BillingInterface
     */
    public function setBillingAddress(AddressInterface $address): BillingInterface
    {
        $this->billingAddress = $address;
        return $this;
    }

    /**
     * @return AddressInterface
     */
    public function getDeliveryAddress(): AddressInterface
    {
        return $this->deliveryAddress;
    }

    /**
     * @param AddressInterface $address
     * @return BillingInterface
     */
    public function setDeliveryAddress(AddressInterface $address): BillingInterface
    {
        $this->deliveryAddress = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return BillingInterface
     */
    public function setReference(string $reference): BillingInterface
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return BillingInterface
     */
    public function setComment(string $comment): BillingInterface
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getDetails(): ArrayCollection
    {
        return $this->details;
    }

    /**
     * @param ArrayCollection $details
     * @return BillingInterface
     */
    public function setDetails(ArrayCollection $details): BillingInterface
    {
        $this->details = $details;
        return $this;
    }

    /**
     * @param BillingDetailsInterface $detail
     * @return BillingInterface
     */
    public function addDetail(BillingDetailsInterface $detail): BillingInterface
    {
        $this->details[] = $detail;
        return $this;
    }

    /**
     * @return float
     */
    public function getExclTaxAmount(): float
    {
        $amount = 0;
        foreach ($this->details as $detail) {
            if ($detail instanceof BillingDetailsInterface) {
                $amount += $detail->getExclTaxAmount();
            }
        }
        return $amount;
    }

    /**
     * @return float
     */
    public function getExclTaxWithDiscountAmount(): float
    {
        $amount = 0;
        foreach ($this->details as $detail) {
            if ($detail instanceof BillingDetailsInterface) {
                $amount += $detail->getExclTaxWithDiscountAmount();
            }
        }
        return $amount;
    }

    /**
     * @return float
     */
    public function getInclTaxAmount(): float
    {
        $amount = 0;
        foreach ($this->details as $detail) {
            if ($detail instanceof BillingDetailsInterface) {
                $amount += $detail->getInclTaxAmount();
            }
        }
        return $amount;
    }
}