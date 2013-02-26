<?php

namespace AltCloud\Instance3MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AltCloud\Instance3MediaBundle\Entity\Gallery
 */
class Gallery
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var datetimetz $datetime
     */
    private $datetime;

    /**
     * @var AltCloud\Instance3MediaBundle\Entity\Media
     */
    private $cover;

    /**
     * @var AltCloud\Instance3MediaBundle\Entity\Media
     */
    private $media;

    public function __construct()
    {
        $this->media = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set datetime
     *
     * @param datetimetz $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * Get datetime
     *
     * @return datetimetz 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set cover
     *
     * @param AltCloud\Instance3MediaBundle\Entity\Media $cover
     */
    public function setCover(\AltCloud\Instance3MediaBundle\Entity\Media $cover)
    {
        $this->cover = $cover;
    }

    /**
     * Get cover
     *
     * @return AltCloud\Instance3MediaBundle\Entity\Media 
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Add media
     *
     * @param AltCloud\Instance3MediaBundle\Entity\Media $media
     */
    public function addMedia(\AltCloud\Instance3MediaBundle\Entity\Media $media)
    {
        $this->media[] = $media;
    }

    /**
     * Get media
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Remove media
     *
     * @param \AltCloud\Instance3MediaBundle\Entity\Media $media
     */
    public function removeMedia(\AltCloud\Instance3MediaBundle\Entity\Media $media)
    {
        $this->media->removeElement($media);
    }
}