<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="road_sections")
 * @ORM\Entity(repositoryClass="App\Repository\RoadSectionRepository")
 */
class RoadSection
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $section_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $section_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $unit_id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $section_begin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $section_end;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $level;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSectionId(): ?string
    {
        return $this->section_id;
    }

    public function setSectionId(string $section_id): self
    {
        $this->section_id = $section_id;

        return $this;
    }

    public function getSectionName(): ?string
    {
        return $this->section_name;
    }

    public function setSectionName(?string $section_name): self
    {
        $this->section_name = $section_name;

        return $this;
    }

    public function getUnitId(): ?int
    {
        return $this->unit_id;
    }

    public function setUnitId(int $unit_id): self
    {
        $this->unit_id = $unit_id;

        return $this;
    }

    public function getSectionBegin(): ?float
    {
        return $this->section_begin;
    }

    public function setSectionBegin(?float $section_begin): self
    {
        $this->section_begin = $section_begin;

        return $this;
    }

    public function getSectionEnd(): ?float
    {
        return $this->section_end;
    }

    public function setSectionEnd(?float $section_end): self
    {
        $this->section_end = $section_end;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }
}
