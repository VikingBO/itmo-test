<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * @ORM\Table(name="book",
 *     uniqueConstraints={
 *        @UniqueConstraint(name="book_unique",
 *            columns={"name", "year_edition"})
 *    }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
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
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $year_edition;

    /**
     * @ORM\Column(type="integer",unique=true)
     */
    private $isbn;

    /**
     * @ORM\Column(type="integer")
     */
    private $page_count;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cover_img;

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

    public function getYearEdition(): ?int
    {
        return $this->year_edition;
    }

    public function setYearEdition(int $year_edition): self
    {
        $this->year_edition = $year_edition;

        return $this;
    }

    public function getIsbn(): ?int
    {
        return $this->isbn;
    }

    public function setIsbn(int $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getPageCount(): ?int
    {
        return $this->page_count;
    }

    public function setPageCount(int $page_count): self
    {
        $this->page_count = $page_count;

        return $this;
    }

    public function getCoverImg(): ?string
    {
        return $this->cover_img;
    }

    public function setCoverImg(?string $cover_img): self
    {
        $this->cover_img = $cover_img;

        return $this;
    }
}
