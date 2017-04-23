<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Front
 *
 * @ORM\Table(name="front")
 * @ORM\Entity
 */
class Front
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
     * @return FrontEnd
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
     * @return FrontEnd
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
     * @return FrontEnd
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
     * @return FrontEnd
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
}
