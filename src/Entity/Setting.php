<?php

namespace App\Entity;

use App\Repository\SettingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SettingRepository::class)
 */
class Setting
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $setting_type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $setting_value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSettingType(): ?string
    {
        return $this->setting_type;
    }

    public function setSettingType(string $setting_type): self
    {
        $this->setting_type = $setting_type;

        return $this;
    }

    public function getSettingValue(): ?string
    {
        return $this->setting_value;
    }

    public function setSettingValue(string $setting_value): self
    {
        $this->setting_value = $setting_value;

        return $this;
    }
}
