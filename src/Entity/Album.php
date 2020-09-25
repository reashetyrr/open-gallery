<?php

namespace App\Entity;

use App\Repository\AlbumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlbumRepository::class)
 */
class Album
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Album::class, inversedBy="albums")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity=Album::class, mappedBy="parent")
     */
    private $albums;

    /**
     * @ORM\ManyToMany(targetEntity=MediaItem::class, mappedBy="Album")
     */
    private $mediaItems;

    public function __construct()
    {
        $this->albums = new ArrayCollection();
        $this->mediaItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    public function addAlbum(self $album): self
    {
        if (!$this->albums->contains($album)) {
            $this->albums[] = $album;
            $album->setParent($this);
        }

        return $this;
    }

    public function removeAlbum(self $album): self
    {
        if ($this->albums->contains($album)) {
            $this->albums->removeElement($album);
            // set the owning side to null (unless already changed)
            if ($album->getParent() === $this) {
                $album->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MediaItem[]
     */
    public function getMediaItems(): Collection
    {
        return $this->mediaItems;
    }

    public function addMediaItem(MediaItem $mediaItem): self
    {
        if (!$this->mediaItems->contains($mediaItem)) {
            $this->mediaItems[] = $mediaItem;
            $mediaItem->addAlbum($this);
        }

        return $this;
    }

    public function removeMediaItem(MediaItem $mediaItem): self
    {
        if ($this->mediaItems->contains($mediaItem)) {
            $this->mediaItems->removeElement($mediaItem);
            $mediaItem->removeAlbum($this);
        }

        return $this;
    }
}
