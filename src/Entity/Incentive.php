<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Incentive
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\IncentiveProgram", inversedBy="programIncentives")
     * @ORM\JoinColumn(name="program_id", referencedColumnName="id")
     */
    private $program;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Achievement", inversedBy="programIncentives")
     * @ORM\JoinColumn(name="achievement_id", referencedColumnName="id")
     */
    private $achievement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reward", inversedBy="programIncentives")
     * @ORM\JoinColumn(name="reward_id", referencedColumnName="id")
     */
    private $reward;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProgram(): ?IncentiveProgram
    {
        return $this->program;
    }

    public function setProgram(?IncentiveProgram $program): self
    {
        $this->program = $program;

        return $this;
    }

    public function getAchievement(): ?Achievement
    {
        return $this->achievement;
    }

    public function setAchievement(?Achievement $achievement): self
    {
        $this->achievement = $achievement;

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
}