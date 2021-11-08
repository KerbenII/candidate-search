<?php

namespace App\Candidate\Application\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CandidateTag
 *
 * @ORM\Table(name="candidate-tag", indexes={@ORM\Index(name="FK_candidate-tags_tags", columns={"tag_id"}), @ORM\Index(name="FK_candidate-tags_candidate", columns={"candidate_id"})})
 * @ORM\Entity
 */
class CandidateTag
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
     * @var Candidate
     *
     * @ORM\ManyToOne(targetEntity="Candidate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="candidate_id", referencedColumnName="id")
     * })
     */
    private $candidate;

    /**
     * @var Tags
     *
     * @ORM\ManyToOne(targetEntity="Tags")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     * })
     */
    private $tag;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCandidate(): ?Candidate
    {
        return $this->candidate;
    }

    public function setCandidate(?Candidate $candidate): self
    {
        $this->candidate = $candidate;

        return $this;
    }

    public function getTag(): ?Tags
    {
        return $this->tag;
    }

    public function setTag(?Tags $tag): self
    {
        $this->tag = $tag;

        return $this;
    }
}
