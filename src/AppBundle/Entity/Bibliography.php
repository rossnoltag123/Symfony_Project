<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="bibliography")
 */
class Bibliography
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
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
     * @ORM\Column(name="text_summary", type="string", length=255)
     */
    private $textSummary;


//    /**
//     * @var string
//     *
//     * @ORM\Column(name="proposed", type="string", length=255)
//     */
//    private $proposed;




    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


//    /**
//     * @return mixed
//     */
//    public function getProposed()
//    {
//        return $this->proposed;
//    }
//
//    /**
//     * @param mixed $proposed
//     */
//    public function setProposed($proposed)
//    {
//        $this->proposed = $proposed;
//    }

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
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return StudentRef2
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
     * @return StudentRef2
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
     * Set textSummary
     *
     * @param string $textSummary
     *
     * @return StudentRef2
     */
    public function setTextSummary($textSummary)
    {
        $this->textSummary = $textSummary;

        return $this;
    }

    /**
     * Get textSummary
     *
     * @return string
     */
    public function getTextSummary()
    {
        return $this->textSummary;
    }
}