<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ApiResource()
 */
class ProgramEmployee
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $employee_num;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $start_date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserProgramEmployee", mappedBy="programEmployee")
     */
    private $userProgramEmployees;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OfferedReward", mappedBy="programEmployee")
     */
    private $userRewards;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EarnedAchievement", mappedBy="programEmployee")
     */
    private $earnedAchievements;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\IncentiveProgram", inversedBy="programEmployees")
     * @ORM\JoinColumn(name="employer_program_id", referencedColumnName="id")
     */
    private $employerProgram;

    public function __construct()
    {
        $this->userProgramEmployees = new ArrayCollection();
        $this->userRewards = new ArrayCollection();
        $this->earnedAchievements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeeNum(): ?string
    {
        return $this->employee_num;
    }

    public function setEmployeeNum(?string $employee_num): self
    {
        $this->employee_num = $employee_num;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(?\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * @return Collection|UserProgramEmployee[]
     */
    public function getUserProgramEmployees(): Collection
    {
        return $this->userProgramEmployees;
    }

    public function addUserProgramEmployee(UserProgramEmployee $userProgramEmployee): self
    {
        if (!$this->userProgramEmployees->contains($userProgramEmployee)) {
            $this->userProgramEmployees[] = $userProgramEmployee;
            $userProgramEmployee->setProgramEmployee($this);
        }

        return $this;
    }

    public function removeUserProgramEmployee(UserProgramEmployee $userProgramEmployee): self
    {
        if ($this->userProgramEmployees->removeElement($userProgramEmployee)) {
            // set the owning side to null (unless already changed)
            if ($userProgramEmployee->getProgramEmployee() === $this) {
                $userProgramEmployee->setProgramEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OfferedReward[]
     */
    public function getUserRewards(): Collection
    {
        return $this->userRewards;
    }

    public function addUserReward(OfferedReward $userReward): self
    {
        if (!$this->userRewards->contains($userReward)) {
            $this->userRewards[] = $userReward;
            $userReward->setProgramEmployee($this);
        }

        return $this;
    }

    public function removeUserReward(OfferedReward $userReward): self
    {
        if ($this->userRewards->removeElement($userReward)) {
            // set the owning side to null (unless already changed)
            if ($userReward->getProgramEmployee() === $this) {
                $userReward->setProgramEmployee(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EarnedAchievement[]
     */
    public function getEarnedAchievements(): Collection
    {
        return $this->earnedAchievements;
    }

    public function addEarnedAchievement(EarnedAchievement $earnedAchievement): self
    {
        if (!$this->earnedAchievements->contains($earnedAchievement)) {
            $this->earnedAchievements[] = $earnedAchievement;
            $earnedAchievement->setProgramEmployee($this);
        }

        return $this;
    }

    public function removeEarnedAchievement(EarnedAchievement $earnedAchievement): self
    {
        if ($this->earnedAchievements->removeElement($earnedAchievement)) {
            // set the owning side to null (unless already changed)
            if ($earnedAchievement->getProgramEmployee() === $this) {
                $earnedAchievement->setProgramEmployee(null);
            }
        }

        return $this;
    }

    public function getEmployerProgram(): ?IncentiveProgram
    {
        return $this->employerProgram;
    }

    public function setEmployerProgram(?IncentiveProgram $employerProgram): self
    {
        $this->employerProgram = $employerProgram;

        return $this;
    }
}