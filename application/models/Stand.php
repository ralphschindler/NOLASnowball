<?php

namespace application\models;

/**
 * @Entity(repositoryClass="application\models\repository\StandRepository")
 * @Table(name="stands")
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

}