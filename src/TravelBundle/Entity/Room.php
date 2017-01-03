<?php

namespace TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use TravelBundle\Entity\Hotel;

/**
 * Room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity(repositoryClass="TravelBundle\Repository\RoomRepository")
 */
class Room
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
     */
    private $roomNumber;

    /**
     * @var int
     */
    private $capacity;

    /**
     * @var boolean
     */
    private $book;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="Hotel", inversedBy="rooms")
     *
     */
    private $hotel;

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
     * @return mixed
     */
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    /**
     * @param mixed $roomNumber
     */
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;
    }

    /**
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param int $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return boolean
     */
    public function isBook()
    {
        return $this->book;
    }

    /**
     * @param boolean $book
     */
    public function setBook($book)
    {
        $this->book = $book;
    }

    /**
     * @return int
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * @param int $hotel
     */
    public function setHotel($hotel)
    {
        $this->hotel = $hotel;
    }




    /**
     * Get book
     *
     * @return boolean
     */
    public function getBook()
    {
        return $this->book;
    }
}
