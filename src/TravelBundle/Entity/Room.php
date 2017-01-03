<?php

namespace TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity(repositoryClass="TravelBundle\Repository\roomRepository")
 */
class Room
{
    /**
     * @ORM\ManyToOne(targetEntity="Hotel", inversedBy="rooms")
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     */
    private $hotel;

    /**
     * @return mixed
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * @param mixed $hotel
     */
    public function setHotel($hotel)
    {
        $this->hotel = $hotel;
    }



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
     * @ORM\Column(name="room_number", type="string", length=255)
     */
    private $roomNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     * @var int
     *
     * @ORM\Column(name="book", type="integer")
     */
    private $book;


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
     * Set roomNumber
     *
     * @param string $roomNumber
     *
     * @return room
     */
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    /**
     * Get roomNumber
     *
     * @return string
     */
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return room
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set book
     *
     * @param integer $book
     *
     * @return room
     */
    public function setBook($book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return int
     */
    public function getBook()
    {
        return $this->book;
    }
}

