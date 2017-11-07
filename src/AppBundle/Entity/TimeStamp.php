<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimeStamp
 *
 * @ORM\Table(name="time_stamp")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TimeStampRepository")
 */
class TimeStamp
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
     * @var integer
     *
     * @ORM\Column(name="date", type="integer", unique=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="start", type="string", length=255)
     */
    private $start;

    /**
     * @var int
     *
     * @ORM\Column(name="pause", type="integer")
     */
    private $pause;

    /**
     * @var string
     *
     * @ORM\Column(name="finish", type="string", length=255)
     */
    private $finish;


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
     * Set date
     *
     * @param integer $date
     *
     * @return TimeStamp
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return integer
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set start
     *
     * @param string $start
     *
     * @return TimeStamp
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set pause
     *
     * @param integer $pause
     *
     * @return TimeStamp
     */
    public function setPause($pause)
    {
        $this->pause = $pause;

        return $this;
    }

    /**
     * Get pause
     *
     * @return int
     */
    public function getPause()
    {
        return $this->pause;
    }

    /**
     * Set finish
     *
     * @param string $finish
     *
     * @return TimeStamp
     */
    public function setFinish($finish)
    {
        $this->finish = $finish;

        return $this;
    }

    /**
     * Get finish
     *
     * @return string
     */
    public function getFinish()
    {
        return $this->finish;
    }
}
