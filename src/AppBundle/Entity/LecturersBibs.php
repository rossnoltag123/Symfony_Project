<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LecturersBibs
 *
 * @ORM\Table(name="lecturers_bibs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LecturersBibsRepository")
 */
class LecturersBibs
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ComputerScience", type="string", length=255)
     */
    private $computerScience;

    /**
     * @var string
     *
     * @ORM\Column(name="WebDev", type="string", length=255)
     */
    private $webDev;

    /**
     * @var string
     *
     * @ORM\Column(name="Maths", type="string", length=255)
     */
    private $maths;

    /**
     * @var string
     *
     * @ORM\Column(name="GitHub", type="string", length=255)
     */
    private $gitHub;

    /**
     * @var string
     *
     * @ORM\Column(name="Science", type="string", length=255)
     */
    private $science;


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
     * Set computerScience
     *
     * @param string $computerScience
     *
     * @return LecturersBibs
     */
    public function setComputerScience($computerScience)
    {
        $this->computerScience = $computerScience;

        return $this;
    }

    /**
     * Get computerScience
     *
     * @return string
     */
    public function getComputerScience()
    {
        return $this->computerScience;
    }

    /**
     * Set webDev
     *
     * @param string $webDev
     *
     * @return LecturersBibs
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

    /**
     * Set maths
     *
     * @param string $maths
     *
     * @return LecturersBibs
     */
    public function setMaths($maths)
    {
        $this->maths = $maths;

        return $this;
    }

    /**
     * Get maths
     *
     * @return string
     */
    public function getMaths()
    {
        return $this->maths;
    }

    /**
     * Set gitHub
     *
     * @param string $gitHub
     *
     * @return LecturersBibs
     */
    public function setGitHub($gitHub)
    {
        $this->gitHub = $gitHub;

        return $this;
    }

    /**
     * Get gitHub
     *
     * @return string
     */
    public function getGitHub()
    {
        return $this->gitHub;
    }

    /**
     * Set science
     *
     * @param string $science
     *
     * @return LecturersBibs
     */
    public function setScience($science)
    {
        $this->science = $science;

        return $this;
    }

    /**
     * Get science
     *
     * @return string
     */
    public function getScience()
    {
        return $this->science;
    }
}

