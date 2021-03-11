<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AchievementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AchievementRepository::class)
 * @ApiResource()
 */
class Achievement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EventStructure", mappedBy="achievement")
     */
    private $eventStructures;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Incentive", mappedBy="achievement")
     */
    private $programIncentives;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EarnedAchievement", mappedBy="achievement")
     */
    private $earnedAchievements;

    /**
     * @ORM\Column(type="string", unique=true, length=50, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, options={"default":""})
     */
    private $description;

    public function __construct()
    {
        $this->eventStructures = new ArrayCollection();
        $this->programIncentives = new ArrayCollection();
        $this->earnedAchievements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|EventStructure[]
     */
    public function getEventStructures(): Collection
    {
        return $this->eventStructures;
    }

    public function addEventStructure(EventStructure $eventStructure): self
    {
        if (!$this->eventStructures->contains($eventStructure)) {
            $this->eventStructures[] = $eventStructure;
            $eventStructure->setAchievement($this);
        }

        return $this;
    }

    public function removeEventStructure(EventStructure $eventStructure): self
    {
        if ($this->eventStructures->removeElement($eventStructure)) {
            // set the owning side to null (unless already changed)
            if ($eventStructure->getAchievement() === $this) {
                $eventStructure->setAchievement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Incentive[]
     */
    public function getProgramIncentives(): Collection
    {
        return $this->programIncentives;
    }

    public function addProgramIncentive(Incentive $programIncentive): self
    {
        if (!$this->programIncentives->contains($programIncentive)) {
            $this->programIncentives[] = $programIncentive;
            $programIncentive->setAchievement($this);
        }

        return $this;
    }

    public function removeProgramIncentive(Incentive $programIncentive): self
    {
        if ($this->programIncentives->removeElement($programIncentive)) {
            // set the owning side to null (unless already changed)
            if ($programIncentive->getAchievement() === $this) {
                $programIncentive->setAchievement(null);
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
            $earnedAchievement->setAchievement($this);
        }

        return $this;
    }

    public function removeEarnedAchievement(EarnedAchievement $earnedAchievement): self
    {
        if ($this->earnedAchievements->removeElement($earnedAchievement)) {
            // set the owning side to null (unless already changed)
            if ($earnedAchievement->getAchievement() === $this) {
                $earnedAchievement->setAchievement(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}