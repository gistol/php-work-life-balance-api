<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timestamp
 *
 * @ORM\Table(name="timestamp")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TimestampRepository")
 */
class Timestamp
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
     * @ORM\Column(name="date", type="string", length=255, unique=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="start", type="string", length=255, nullable=true)
     */
    private $start;

    /**
     * @var string
     *
     * @ORM\Column(name="pause", type="string", length=255, nullable=true)
     */
    private $pause;

    /**
     * @var string
     *
     * @ORM\Column(name="finish", type="string", length=255, nullable=true)
     */
    private $finish;

    /**
     * @var int
     *
     * @ORM\Column(name="unixtime", type="integer", nullable=true)
     */
    private $unixtime;

    /**
     * @var int
     *
     * @ORM\Column(name="week", type="integer", nullable=true)
     */
    private $week;


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
     * @param string $date
     *
     * @return Timestamp
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
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
     * @return Timestamp
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
     * @param string $pause
     *
     * @return Timestamp
     */
    public function setPause($pause)
    {
        $this->pause = $pause;

        return $this;
    }

    /**
     * Get pause
     *
     * @return string
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
     * @return Timestamp
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

    /**
     * Set unixtime
     *
     * @param integer $unixtime
     *
     * @return Timestamp
     */
    public function setUnixtime($unixtime)
    {
        $this->unixtime = $unixtime;

        return $this;
    }

    /**
     * Get unixtime
     *
     * @return int
     */
    public function getUnixtime()
    {
        return $this->unixtime;
    }

    /**
     * Set week
     *
     * @param integer $week
     *
     * @return Timestamp
     */
    public function setWeek($week)
    {
        $this->week = $week;

        return $this;
    }

    /**
     * Get week
     *
     * @return int
     */
    public function getWeek()
    {
        return $this->week;
    }
}

