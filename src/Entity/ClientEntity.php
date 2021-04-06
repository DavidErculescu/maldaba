<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Client
 *
 * @ORM\Table(name="clients",uniqueConstraints={@ORM\UniqueConstraint(name="client_email_uindex", columns={"email"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class ClientEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstName", type="string", length=50, nullable=false)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="surname", type="string", length=50, nullable=false)
     */
    private $surname;

    /**
     * @var string|null
     *
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     * @ORM\Column(name="email", type="string", length=60, nullable=false)
     */
    private $email;

    /**
     * @Assert\DateTime()
     * @ORM\Column(name="date_of_birth", type="datetime")
     */
    private $dateOfBirth;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mobile_phone", type="string", length=20, nullable=false)
     */
    private $mobilePhone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postcode", type="string", length=20, nullable=false)
     */
    private $postcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_1", type="string", length=50, nullable=false)
     */
    private $address_1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_2", type="string", length=50, nullable=false)
     */
    private $address_2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=false)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="StatusEntity")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param mixed $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return string|null
     */
    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    /**
     * @param string|null $mobilePhone
     */
    public function setMobilePhone(?string $mobilePhone): void
    {
        $this->mobilePhone = $mobilePhone;
    }

    /**
     * @return string|null
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * @param string|null $postcode
     */
    public function setPostcode(?string $postcode): void
    {
        $this->postcode = $postcode;
    }

    /**
     * @return string|null
     */
    public function getAddress1(): ?string
    {
        return $this->address_1;
    }

    /**
     * @param string|null $address_1
     */
    public function setAddress1(?string $address_1): void
    {
        $this->address_1 = $address_1;
    }

    /**
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address_2;
    }

    /**
     * @param string|null $address_2
     */
    public function setAddress2(?string $address_2): void
    {
        $this->address_2 = $address_2;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }
}