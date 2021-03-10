<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class UserProgramEmployee
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProgramEmployee", inversedBy="userProgramEmployees")
     * @ORM\JoinColumn(name="program_employee_id", referencedColumnName="id")
     */
    private $programEmployee;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userProgramEmployees")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}