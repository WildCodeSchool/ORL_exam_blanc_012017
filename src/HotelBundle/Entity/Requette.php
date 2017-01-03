<?php

namespace HotelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Requette
 *
 * @ORM\Table(name="requette")
 * @ORM\Entity(repositoryClass="HotelBundle\Repository\RequetteRepository")
 */
class Requette
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
     * @var int
     *
     * @ORM\Column(name="nb", type="integer")
     */
    private $nb;


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
     * Set nb
     *
     * @param integer $nb
     *
     * @return Requette
     */
    public function setNb($nb)
    {
        $this->nb = $nb;

        return $this;
    }

    /**
     * Get nb
     *
     * @return int
     */
    public function getNb()
    {
        return $this->nb;
    }
}
