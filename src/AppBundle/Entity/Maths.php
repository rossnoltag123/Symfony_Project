<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maths
 *
 * @ORM\Table(name="maths")
 * @ORM\Entity
 */
class Maths
{
    /**
     *
     *
     * @ORM\Column( type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     *
     * @ORM\Column( type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=255)
     */
    private $tag;

    /**
     * @var string
     *
     * @ORM\Column(name="textsummary", type="string", length=255)
     */
    private $textsummary;

    /**
     * @var string
     *
     * @ORM\Column(name="WebDev", type="string", length=255)
     */
    private $webDev;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Maths
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Maths
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return Maths
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set textsummary
     *
     * @param string $textsummary
     *
     * @return Maths
     */
    public function setTextsummary($textsummary)
    {
        $this->textsummary = $textsummary;

        return $this;
    }

    /**
     * Get textsummary
     *
     * @return string
     */
    public function getTextsummary()
    {
        return $this->textsummary;
    }

    /**
     * Set webDev
     *
     * @param string $webDev
     *
     * @return Maths
     */
    public function setWebDev($webDev)
    {
        $this->webDev = $webDev;

        return $this;
    }

    /**
     * Get webDev
     *
     * @return string
     */
    public function getWebDev()
    {
        return $this->webDev;
    }
}
