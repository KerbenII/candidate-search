<?php

declare(strict_types=1);

namespace App\Candidate\Infrastructure\Dto;

use App\Shared\Application\Dto\DtoInterface;

final class CandidateDetailsDto implements DtoInterface
{
    private int $id;
    private string $email;
    private string $firstName;
    private string $lastName;
    private \DateTime $birthdayDate;
    private string $resumeBlob;

    public function __construct(
        int $id,
        string $email,
        string $firstName,
        string $lastName,
        \DateTime $birthdayDate,
        string $resumeBlob
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdayDate = $birthdayDate;
        $this->resumeBlob = $resumeBlob;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return \DateTime
     */
    public function getBirthdayDate(): \DateTime
    {
        return $this->birthdayDate;
    }

    /**
     * @return string
     */
    public function getResumeBlob(): string
    {
        return $this->resumeBlob;
    }
}
