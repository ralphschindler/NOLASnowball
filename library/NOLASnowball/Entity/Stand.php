<?php

namespace NOLASnowball\Entity;

/**
 * @Entity(repositoryClass="NOLASnowball\Entity\Repository\StandRepository")
 */
class Stand
{
    /**
     * @Id @GeneratedValue
     * @Column(type="bigint")
     * @var integer
     */
    protected $id;

    /**
     * @Column(type="string", length=250)
     * @var string
     */
    protected $name;

    /**
     * @Column(type="string", length=250)
     * @var string
     */
    protected $address;

    /**
     * @Column(type="string", length=150)
     * @var string
     */
    protected $city;

    /**
     * @Column(type="string", length=2)
     * @var string
     */
    protected $state;

    /**
     * @Column(type="string", length=8)
     * @var string
     */
    protected $zipCode;

    /**
     * Get id
     *
     * @return bigint $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Get state
     *
     * @return string $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * Get zipCode
     *
     * @return string $zipCode
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
}
