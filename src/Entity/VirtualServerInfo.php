<?php

namespace App\Entity;

use App\Repository\VirtualServerInfoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VirtualServerInfoRepository::class)
 */
class VirtualServerInfo
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
    private $current_users_online;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_users;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $uptime;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentUsersOnline(): ?int
    {
        return $this->current_users_online;
    }

    public function setCurrentUsersOnline(int $current_users_online): self
    {
        $this->current_users_online = $current_users_online;

        return $this;
    }

    public function getMaxUsers(): ?int
    {
        return $this->max_users;
    }

    public function setMaxUsers(int $max_users): self
    {
        $this->max_users = $max_users;

        return $this;
    }

    public function getUptime(): ?string
    {
        return $this->uptime;
    }

    public function setUptime(string $uptime): self
    {
        $this->uptime = $uptime;

        return $this;
    }
}
