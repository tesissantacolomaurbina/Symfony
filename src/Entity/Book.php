<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
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
     * @ORM\Column(type="string", length=255)
     */
    private $isbn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $editorial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $publishYear;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserBook", mappedBy="book", orphanRemoval=true)
     */
    private $userBooks;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="books", cascade={"persist"})
     */
    private $author;

    public function __construct()
    {
        $this->userBooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getEditorial(): ?string
    {
        return $this->editorial;
    }

    public function setEditorial(string $editorial): self
    {
        $this->editorial = $editorial;

        return $this;
    }

    public function getPublishYear(): ?string
    {
        return $this->publishYear;
    }

    public function setPublishYear(string $publishYear): self
    {
        $this->publishYear = $publishYear;

        return $this;
    }

    /**
     * @return Collection|UserBook[]
     */
    public function getUserBooks(): Collection
    {
        return $this->userBooks;
    }

    public function addUserBook(UserBook $userBook): self
    {
        if (!$this->userBooks->contains($userBook)) {
            $this->userBooks[] = $userBook;
            $userBook->setBook($this);
        }

        return $this;
    }

    public function removeUserBook(UserBook $userBook): self
    {
        if ($this->userBooks->contains($userBook)) {
            $this->userBooks->removeElement($userBook);
            // set the owning side to null (unless already changed)
            if ($userBook->getBook() === $this) {
                $userBook->setBook(null);
            }
        }

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }
}
