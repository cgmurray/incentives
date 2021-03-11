<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=60, nullable=false)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HealthMetricLog", mappedBy="user")
     */
    private $logs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserProgramEmployee", mappedBy="user")
     */
    private $userProgramEmployees;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Birth", mappedBy="user")
     */
    private $births;

    public function __construct()
    {
        $this->logs = new ArrayCollection();
        $this->userProgramEmployees = new ArrayCollection();
        $this->births = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|HealthMetricLog[]
     */
    public function getLogs(): Collection
    {
        return $this->logs;
    }

    public function addLog(HealthMetricLog $log): self
    {
        if (!$this->logs->contains($log)) {
            $this->logs[] = $log;
            $log->setUser($this);
        }

        return $this;
    }

    public function removeLog(HealthMetricLog $log): self
    {
        if ($this->logs->removeElement($log)) {
            // set the owning side to null (unless already changed)
            if ($log->getUser() === $this) {
                $log->setUser(null);
            }
        }

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
            $userProgramEmployee->setUser($this);
        }

        return $this;
    }

    public function removeUserProgramEmployee(UserProgramEmployee $userProgramEmployee): self
    {
        if ($this->userProgramEmployees->removeElement($userProgramEmployee)) {
            // set the owning side to null (unless already changed)
            if ($userProgramEmployee->getUser() === $this) {
                $userProgramEmployee->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Birth[]
     */
    public function getBirths(): Collection
    {
        return $this->births;
    }

    public function addBirth(Birth $birth): self
    {
        if (!$this->births->contains($birth)) {
            $this->births[] = $birth;
            $birth->setUser($this);
        }

        return $this;
    }

    public function removeBirth(Birth $birth): self
    {
        if ($this->births->removeElement($birth)) {
            // set the owning side to null (unless already changed)
            if ($birth->getUser() === $this) {
                $birth->setUser(null);
            }
        }

        return $this;
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
}