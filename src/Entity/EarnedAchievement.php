<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ApiResource()
 */
class EarnedAchievement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Achievement", inversedBy="earnedAchievements")
     * @ORM\JoinColumn(name="achievement_id", referencedColumnName="id")
     */
    private $achievement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProgramEmployee", inversedBy="earnedAchievements")
     * @ORM\JoinColumn(name="program_employee_id", referencedColumnName="id")
     */
    private $programEmployee;

    public function getId(): ?int
    {
        return $this->id;
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