<?php

namespace App\Entity;

use App\Repository\EmployerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployerRepository::class)
 */
class Employer
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\IncentiveProgram", mappedBy="employer")
     */
    private $employerPrograms;

    public function __construct()
    {
        $this->employerPrograms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|IncentiveProgram[]
     */
    public function getEmployerPrograms(): Collection
    {
        return $this->employerPrograms;
    }

    public function addEmployerProgram(IncentiveProgram $employerProgram): self
    {
        if (!$this->employerPrograms->contains($employerProgram)) {
            $this->employerPrograms[] = $employerProgram;
            $employerProgram->setEmployer($this);
        }

        return $this;
    }

    public function removeEmployerProgram(IncentiveProgram $employerProgram): self
    {
        if ($this->employerPrograms->removeElement($employerProgram)) {
            // set the owning side to null (unless already changed)
            if ($employerProgram->getEmployer() === $this) {
                $employerProgram->setEmployer(null);
            }
        }

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }
}