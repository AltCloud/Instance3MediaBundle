<?php

namespace AltCloud\Instance3MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AltCloud\Instance3MediaBundle\Entity\Format
 */
class Format
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $format_type
     */
    private $format_type;

    /**
     * @var string $media_type
     */
    private $media_type;

    /**
     * @var array $media_params
     */
    private $media_params;

    /**
     * @var AltCloud\Instance3MediaBundle\Entity\Media
     */
    private $media;


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
     * Set format_type
     *
     * @param string $formatType
     */
    public function setFormatType($formatType)
    {
        $this->format_type = $formatType;
    }

    /**
     * Get format_type
     *
     * @return string 
     */
    public function getFormatType()
    {
        return $this->format_type;
    }

    /**
     * Set media_type
     *
     * @param string $mediaType
     */
    public function setMediaType($mediaType)
    {
        $this->media_type = $mediaType;
    }

    /**
     * Get media_type
     *
     * @return string 
     */
    public function getMediaType()
    {
        return $this->media_type;
    }

    /**
     * Set media_params
     *
     * @param array $mediaParams
     */
    public function setMediaParams($mediaParams)
    {
        $this->media_params = $mediaParams;
    }

    /**
     * Get media_params
     *
     * @return array 
     */
    public function getMediaParams()
    {
        return $this->media_params;
    }

    /**
     * Set media
     *
     * @param AltCloud\Instance3MediaBundle\Entity\Media $media
     */
    public function setMedia(\AltCloud\Instance3MediaBundle\Entity\Media $media)
    {
        $this->media = $media;
    }

    /**
     * Get media
     *
     * @return AltCloud\Instance3MediaBundle\Entity\Media 
     */
    public function getMedia()
    {
        return $this->media;
    }
}