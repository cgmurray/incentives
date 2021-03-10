<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class IncentiveProgram
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProgramEmployee", mappedBy="employerProgram")
     */
    private $programEmployees;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Incentive", mappedBy="program")
     */
    private $programIncentives;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employer", inversedBy="employerPrograms")
     * @ORM\JoinColumn(name="employer_id", referencedColumnName="id")
     */
    private $employer;

    public function __construct()
    {
        $this->programEmployees = new ArrayCollection();
        $this->programIncentives = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|ProgramEmployee[]
     */
    public function getProgramEmployees(): Collection
    {
        return $this->programEmployees;
    }

    public function addProgramEmployee(ProgramEmployee $programEmployee): self
    {
        if (!$this->programEmployees->contains($programEmployee)) {
            $this->programEmployees[] = $programEmployee;
            $programEmployee->setEmployerProgram($this);
        }

        return $this;
    }

    public function removeProgramEmployee(ProgramEmployee $programEmployee): self
    {
        if ($this->programEmployees->removeElement($programEmployee)) {
            // set the owning side to null (unless already changed)
            if ($programEmployee->getEmployerProgram() === $this) {
                $programEmployee->setEmployerProgram(null);
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
            $programIncentive->setProgram($this);
        }

        return $this;
    }

    public function removeProgramIncentive(Incentive $programIncentive): self
    {
        if ($this->programIncentives->removeElement($programIncentive)) {
            // set the owning side to null (unless already changed)
            if ($programIncentive->getProgram() === $this) {
                $programIncentive->setProgram(null);
            }
        }

        return $this;
    }

    public function getEmployer(): ?Employer
    {
        return $this->employer;
    }

    public function setEmployer(?Employer $employer): self
    {
        $this->employer = $employer;

        return $this;
    }
}