<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="jobs")
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $job_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $job_quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobId(): ?int
    {
        return $this->job_id;
    }

    public function setJobId(int $job_id): self
    {
        $this->job_id = $job_id;

        return $this;
    }

    public function getJobName(): ?string
    {
        return $this->job_name;
    }

    public function setJobName(string $job_name): self
    {
        $this->job_name = $job_name;

        return $this;
    }

    public function getJobQuantity(): ?string
    {
        return $this->job_quantity;
    }

    public function setJobQuantity(?string $job_quantity): self
    {
        $this->job_quantity = $job_quantity;

        return $this;
    }
}
