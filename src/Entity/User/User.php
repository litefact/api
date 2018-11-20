<?php

namespace App\Entity\User;

use App\Entity\Resource\AbstractPerson;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Swagger\Annotations as SWG;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 * @package App\Entity\User
 *
 * @ORM\Entity()
 * @ORM\Table(name="users")
 * @UniqueEntity("email")
 */
class User extends AbstractPerson implements UserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(length=250)
     *
     * @Assert\NotBlank()
     * @Assert\Email()
     *
     * @JMS\Groups({"user-read", "user-write"})
     */
    private $email;

    /**
     * @var string
     *
     * @JMS\Groups({"user-write"})
     *
     * @Assert\NotBlank(groups={"user-write"})
     * @Assert\Regex(pattern="/^(?=.*[a-z])(?=.*\\d).{6,}$/i", groups={"user-write"})
     *
     * @SWG\Property(type="string")
     */
    private $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(length=250)
     */
    private $password;

    /**
     * @var array
     *
     * @ORM\Column(type="json")
     *
     * @JMS\Groups({"user-read"})
     * @JMS\Accessor(getter="getRoles")
     *
     * @SWG\Property(type="array", items={"type"="string"})
     */
    private $roles;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UserInterface
     */
    public function setEmail(string $email): UserInterface
    {
        $this->email = $email;
        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;

        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function setRoles(array $roles): UserInterface
    {
        $this->roles = $roles;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPlainPassword(): string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     * @return UserInterface
     */
    public function setPlainPassword(string $plainPassword): UserInterface
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): UserInterface
    {
        $this->password = $password;
        return $this;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials() {}
}