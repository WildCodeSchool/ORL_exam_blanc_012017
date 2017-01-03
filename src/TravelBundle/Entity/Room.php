<?php

namespace TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="book")
     */
    private $book;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Hotel")
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
     * Set roomNumber
     *
     * @param string $roomNumber
     *
     * @return Room
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
     * @return Room
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
     * @param \bool $book
     *
     * @return Room
     */
    public function setBook($book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \bool
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set hotelId
     *
     * @param \TravelBundle\Entity\Hotel $hotelId
     *
     * @return Room
     */
    public function setHotelId(\TravelBundle\Entity\Hotel $hotelId = null)
    {
        $this->hotel_id = $hotelId;

        return $this;
    }

    /**
     * Get hotelId
     *
     * @return \TravelBundle\Entity\Hotel
     */
    public function getHotelId()
    {
        return $this->hotel_id;
    }

    /**
     * Set hotel
     *
     * @param \TravelBundle\Entity\Hotel $hotel
     *
     * @return Room
     */
    public function setHotel(\TravelBundle\Entity\Hotel $hotel = null)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \TravelBundle\Entity\Hotel
     */
    public function getHotel()
    {
        return $this->hotel;
    }
}
