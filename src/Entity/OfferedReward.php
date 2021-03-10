<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class OfferedReward
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $award_offered_ts;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $award_accepted_ts;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reward", inversedBy="userRewards")
     * @ORM\JoinColumn(name="reward_id", referencedColumnName="id")
     */
    private $reward;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProgramEmployee", inversedBy="userRewards")
     * @ORM\JoinColumn(name="program_employee_id", referencedColumnName="id")
     */
    private $programEmployee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAwardOfferedTs(): ?\DateTimeInterface
    {
        return $this->award_offered_ts;
    }

    public function setAwardOfferedTs(?\DateTimeInterface $award_offered_ts): self
    {
        $this->award_offered_ts = $award_offered_ts;

        return $this;
    }

    public function getAwardAcceptedTs(): ?\DateTimeInterface
    {
        return $this->award_accepted_ts;
    }

    public function setAwardAcceptedTs(?\DateTimeInterface $award_accepted_ts): self
    {
        $this->award_accepted_ts = $award_accepted_ts;

        return $this;
    }

    public function getReward(): ?Reward
    {
        return $this->reward;
    }

    public function setReward(?Reward $reward): self
    {
        $this->reward = $reward;

        return $this;
    }

    public function getProgramEmployee(): ?ProgramEmployee
    {
        return $this->programEmployee;
    }

    public function setProgramEmployee(?ProgramEmployee $programEmployee): self
    {
        $this->programEmployee = $programEmployee;

        return $this;
    }
}