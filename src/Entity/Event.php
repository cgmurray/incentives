<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 * @ApiResource()
 */
class Event
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EventStructure", mappedBy="event")
     */
    private $eventStructures;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HealthMetricLog", mappedBy="event")
     */
    private $logs;

    public function __construct()
    {
        $this->eventStructures = new ArrayCollection();
        $this->logs = new ArrayCollection();
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
            $eventStructure->setEvent($this);
        }

        return $this;
    }

    public function removeEventStructure(EventStructure $eventStructure): self
    {
        if ($this->eventStructures->removeElement($eventStructure)) {
            // set the owning side to null (unless already changed)
            if ($eventStructure->getEvent() === $this) {
                $eventStructure->setEvent(null);
            }
        }

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
            $log->setEvent($this);
        }

        return $this;
    }

    public function removeLog(HealthMetricLog $log): self
    {
        if ($this->logs->removeElement($log)) {
            // set the owning side to null (unless already changed)
            if ($log->getEvent() === $this) {
                $log->setEvent(null);
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
}