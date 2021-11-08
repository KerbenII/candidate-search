<?php

namespace App\Candidate\Application\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidate
 *
 * @ORM\Table(name="candidate")
 * @ORM\Entity
 */
class Candidate
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false, options={"default"="''"})
     */
    private $email = '\'\'';

    /**
     * @var string
     *
     * @ORM\Column(name="first-name", type="string", length=255, nullable=false, options={"default"="''"})
     * @see https://english.stackexchange.com/questions/78894/firstname-or-first-name
     */
    private $firstName = '\'\'';

    /**
     * @var string
     *
     * @ORM\Column(name="last-name", type="string", length=255, nullable=false, options={"default"="''"})
     */
    private $lastName = '\'\'';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday-date", type="date", nullable=false)
     */
    private $birthdayDate;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="blob", length=16777215, nullable=false)
     */
    private $resume;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthdayDate(): ?\DateTimeInterface
    {
        return $this->birthdayDate;
    }

    public function setBirthdayDate(\DateTimeInterface $birthdayDate): self
    {
        $this->birthdayDate = $birthdayDate;

        return $this;
    }

    public function getResume()
    {
        return $this->resume;
    }

    public function setResume($resume): self
    {
        $this->resume = $resume;

        return $this;
    }
}
