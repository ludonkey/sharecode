<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CodeRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *   normalizationContext={"groups"={"read_code"}},
 *   collectionOperations={"get"},
 *   itemOperations={"get"}
 * )
 * @ApiFilter(SearchFilter::class, properties={"title": "partial", "description": "partial", "content": "partial"})
 * @ORM\Entity(repositoryClass=CodeRepository::class)
 */
class Code
{
    /**
     * @Groups({"read_code","read_user"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"read_code","read_user"})
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @Groups({"read_code"})
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @Groups({"read_code"})
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @Groups({"read_code"})
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @Groups({"read_code"})
     * @ORM\ManyToOne(targetEntity=Language::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $language;

    /**
     * @Groups({"read_code"})
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="codes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
