<?php

namespace App\Entity;

use App\Repository\AdminStatusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminStatusRepository::class)
 */
class AdminStatus
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
    private $cldid;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $cluqid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nickname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $permission;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCldid(): ?int
    {
        return $this->cldid;
    }

    public function setCldid(int $cldid): self
    {
        $this->cldid = $cldid;

        return $this;
    }

    public function getCluqid(): ?string
    {
        return $this->cluqid;
    }

    public function setCluqid(string $cluqid): self
    {
        $this->cluqid = $cluqid;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function setPermission(string $permission): self
    {
        $this->permission = $permission;

        return $this;
    }
}
