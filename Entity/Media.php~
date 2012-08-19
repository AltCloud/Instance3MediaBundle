<?php

namespace AltCloud\Instance3MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AltCloud\Instance3MediaBundle\Entity\Media
 */
class Media
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
     * @var AltCloud\Instance3MediaBundle\Entity\Format
     */
    private $thumbnail;

    /**
     * @var AltCloud\Instance3MediaBundle\Entity\Format
     */
    private $formats;

    /**
     * @var AltCloud\Instance3MediaBundle\Entity\Gallery
     */
    private $gallery;

    public function __construct()
    {
        $this->formats = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set thumbnail
     *
     * @param AltCloud\Instance3MediaBundle\Entity\Format $thumbnail
     */
    public function setThumbnail(\AltCloud\Instance3MediaBundle\Entity\Format $thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * Get thumbnail
     *
     * @return AltCloud\Instance3MediaBundle\Entity\Format 
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Add formats
     *
     * @param AltCloud\Instance3MediaBundle\Entity\Format $formats
     */
    public function addFormat(\AltCloud\Instance3MediaBundle\Entity\Format $formats)
    {
        $this->formats[] = $formats;
    }
    
    /**
     * Set formats
     *
     * @param Doctrine\Common\Collections\Collection  $formats
    public function setFormats(\AltCloud\Instance3MediaBundle\Entity\Format $formats)
	{
		foreach ($formats as $format) {
			$format->addMedia($this);
		}
	
		$this->formats = $formats;
	}
     */

    /**
     * Get formats
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFormats()
    {
        return $this->formats;
    }

    /**
     * Set gallery
     *
     * @param AltCloud\Instance3MediaBundle\Entity\Gallery $gallery
     */
    public function setGallery(\AltCloud\Instance3MediaBundle\Entity\Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    /**
     * Get gallery
     *
     * @return AltCloud\Instance3MediaBundle\Entity\Gallery 
     */
    public function getGallery()
    {
        return $this->gallery;
    }
}