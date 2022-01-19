<?php

namespace App\Model;

class Beer
{
    private $id;
    private $name;
    private $description;
    private $image_url;
    private $tagline;
    private $first_brewed;

    public function __construct($id, $name, $description, $image_url, $tagline, $first_brewed)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->tagline = $tagline;
        $this->first_brewed = $first_brewed;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * @param mixed $image_url
     */
    public function setImageUrl($image_url): void
    {
        $this->image_url = $image_url;
    }

    /**
     * @return mixed
     */
    public function getTagline()
    {
        return $this->tagline;
    }

    /**
     * @param mixed $tagline
     */
    public function setTagline($tagline): void
    {
        $this->tagline = $tagline;
    }

    /**
     * @return mixed
     */
    public function getFirstBrewed()
    {
        return $this->first_brewed;
    }

    /**
     * @param mixed $first_brewed
     */
    public function setFirstBrewed($first_brewed): void
    {
        $this->first_brewed = $first_brewed;
    }

}