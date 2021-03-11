<?php

namespace App\Entity;

use App\Repository\RewardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RewardRepository::class)
 */
class Reward
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=0, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, options={"default":""})
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", length=5, nullable=false, options={"default":"0.00"})
     */
    private $cost;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Incentive", mappedBy="reward")
     */
    private $programIncentives;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OfferedReward", mappedBy="reward")
     */
    private $userRewards;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\IncentiveManagingPartner", inversedBy="rewards")
     * @ORM\JoinColumn(name="incentive_managing_partner_id", referencedColumnName="id", nullable=false)
     */
    private $incentiveManagingPartner;

    public function __construct()
    {
        $this->programIncentives = new ArrayCollection();
        $this->userRewards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(?string $cost): self
    {
        $this->cost = $cost;

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
            $programIncentive->setReward($this);
        }

        return $this;
    }

    public function removeProgramIncentive(Incentive $programIncentive): self
    {
        if ($this->programIncentives->removeElement($programIncentive)) {
            // set the owning side to null (unless already changed)
            if ($programIncentive->getReward() === $this) {
                $programIncentive->setReward(null);
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
            $userReward->setReward($this);
        }

        return $this;
    }

    public function removeUserReward(OfferedReward $userReward): self
    {
        if ($this->userRewards->removeElement($userReward)) {
            // set the owning side to null (unless already changed)
            if ($userReward->getReward() === $this) {
                $userReward->setReward(null);
            }
        }

        return $this;
    }

    public function getIncentiveManagingPartner(): ?IncentiveManagingPartner
    {
        return $this->incentiveManagingPartner;
    }

    public function setIncentiveManagingPartner(?IncentiveManagingPartner $incentiveManagingPartner): self
    {
        $this->incentiveManagingPartner = $incentiveManagingPartner;

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