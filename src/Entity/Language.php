<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\LanguageRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   normalizationContext={"groups"={"read_lang"}},
 *   collectionOperations={"get"},
 *   itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass=LanguageRepository::class)
 */
class Language
{
    /**
     * @Groups({"read_code","read_lang"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"read_code","read_lang"})
     * @ORM\Column(type="string", length=255)
     */
    private $fullname;

    /**
     * @Groups({"read_code","read_lang"})
     * @ORM\Column(type="string", length=255)
     */
    private $shortname;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getShortname(): ?string
    {
        return $this->shortname;
    }

    public function setShortname(string $shortname): self
    {
        $this->shortname = $shortname;

        return $this;
    }
}
