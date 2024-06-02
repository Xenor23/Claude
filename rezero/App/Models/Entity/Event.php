<?php

namespace App\Models\Entity;

class Event
{
    private int $id;
    private string $name;
    private string $description;
    private \DateTime $startDateTime;
    private \DateTime $endDateTime;
    private int $minPlayers;
    private int $maxPlayers;
    private string $status;
    private int $createdBy;
    private string $requirements;
    private string $type;
    private ?Image $image;
    private ?int $imageId;

    public function __construct(
        string $name,
        string $description,
        \DateTime $startDateTime,
        \DateTime $endDateTime,
        int $minPlayers,
        int $maxPlayers,
        string $status,
        int $createdBy,
        string $requirements,
        string $type,
        ?Image $image = null,
        ?int $imageId = null
    ) {
        $this->setName($name);
        $this->setDescription($description);
        $this->setStartDateTime($startDateTime);
        $this->setEndDateTime($endDateTime);
        $this->setMinPlayers($minPlayers);
        $this->setMaxPlayers($maxPlayers);
        $this->setStatus($status);
        $this->setCreatedBy($createdBy);
        $this->setRequirements($requirements);
        $this->setType($type);
        $this->setImage($image);
        $this->setImageId($imageId);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getStartDateTime(): \DateTime
    {
        return $this->startDateTime;
    }

    /**
     * @param \DateTime $startDateTime
     */
    public function setStartDateTime(\DateTime $startDateTime): void
    {
        $this->startDateTime = $startDateTime;
    }

    /**
     * @return \DateTime
     */
    public function getEndDateTime(): \DateTime
    {
        return $this->endDateTime;
    }

    /**
     * @param \DateTime $endDateTime
     */
    public function setEndDateTime(\DateTime $endDateTime): void
    {
        $this->endDateTime = $endDateTime;
    }

    /**
     * @return int
     */
    public function getMinPlayers(): int
    {
        return $this->minPlayers;
    }

    /**
     * @param int $minPlayers
     */
    public function setMinPlayers(int $minPlayers): void
    {
        $this->minPlayers = $minPlayers;
    }

    /**
     * @return int
     */
    public function getMaxPlayers(): int
    {
        return $this->maxPlayers;
    }

    /**
     * @param int $maxPlayers
     */
    public function setMaxPlayers(int $maxPlayers): void
    {
        $this->maxPlayers = $maxPlayers;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getCreatedBy(): int
    {
        return $this->createdBy;
    }

    /**
     * @param int $createdBy
     */
    public function setCreatedBy(int $createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return string
     */
    public function getRequirements(): string
    {
        return $this->requirements;
    }

    /**
     * @param string $requirements
     */
    public function setRequirements(string $requirements): void
    {
        $this->requirements = $requirements;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return Image|null
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param Image|null $image
     */
    public function setImage(?Image $image): void
    {
        $this->image = $image;
    }

    /**
     * @return int|null
     */
    public function getImageId(): ?int
    {
        return $this->imageId;
    }

    /**
     * @param int|null $imageId
     */
    public function setImageId(?int $imageId): void
    {
        $this->imageId = $imageId;
    }
}
