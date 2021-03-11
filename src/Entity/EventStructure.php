<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventStructureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventStructure::class)
 * @ApiResource()
 */
class EventStructure
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
    private $name;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default":false})
     */
    private $is_birth;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Achievement", inversedBy="eventStructures")
     * @ORM\JoinColumn(name="achievement_id", referencedColumnName="id")
     */
    private $achievement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Event", inversedBy="eventStructures")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;

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

    public function getIsBirth(): ?bool
    {
        return $this->is_birth;
    }

    public function setIsBirth(bool $is_birth): self
    {
        $this->is_birth = $is_birth;

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

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }
}