<?php

namespace TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity(repositoryClass="TravelBundle\Repository\roomRepository")
 */
class room
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

