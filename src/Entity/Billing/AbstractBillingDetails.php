<?php

namespace App\Entity\Billing;


use Api\Entity\BlameableTrait;
use Api\Entity\EntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class BillingDetailsAbstract
 * @package App\Entity\Billing
 *
 * @ORM\MappedSuperclass()
 */
abstract class AbstractBillingDetails implements BillingDetailsInterface
{
    use EntityTrait;
    use BlameableTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=10, scale=2)
     *
     * @Assert\NotBlank()
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=10, scale=2)
     *
     * @Assert\NotBlank()
     */
    private $vatRate;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=10, scale=2)
     *
     * @Assert\NotBlank()
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $discount1;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $discount2;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank()
     */
    private $position;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BillingDetailsInterface
     */
    public function setName(string $name): BillingDetailsInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     * @return BillingDetailsInterface
     */
    public function setQuantity(float $quantity): BillingDetailsInterface
    {
        $this->quantity = round($quantity, 2);
        return $this;
    }

    /**
     * @return float
     */
    public function getVatRate(): float
    {
        return $this->vatRate;
    }

    /**
     * @param float $vatRate
     * @return BillingDetailsInterface
     */
    public function setVatRate(float $vatRate): BillingDetailsInterface
    {
        $this->vatRate = round($vatRate,2);
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return BillingDetailsInterface
     */
    public function setAmount(float $amount): BillingDetailsInterface
    {
        $this->amount = round($amount, 2);
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount1(): float
    {
        return $this->discount1;
    }

    /**
     * @param float $discount1
     * @return BillingDetailsInterface
     */
    public function setDiscount1(float $discount1): BillingDetailsInterface
    {
        $this->discount1 = round($discount1, 2);
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount2(): float
    {
        return $this->discount2;
    }

    /**
     * @param float $discount2
     * @return BillingDetailsInterface
     */
    public function setDiscount2(float $discount2): BillingDetailsInterface
    {
        $this->discount2 = round($discount2, 2);
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return BillingDetailsInterface
     */
    public function setPosition(int $position): BillingDetailsInterface
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return float
     */
    public function getExclTaxAmount(): float
    {
        return round($this->quantity * $this->amount, 2);
    }

    /**
     * @return float
     */
    public function getExclTaxWithDiscountAmount(): float
    {
        return round($this->getExclTaxAmount() * (1 - $this->discount1 / 100) * (1 - $this->discount2 / 100), 2);
    }

    /**
     * @return float
     */
    public function getInclTaxAmount(): float
    {
        return round($this->getExclTaxWithDiscountAmount() * (1 + $this->vatRate / 100), 2);
    }
}