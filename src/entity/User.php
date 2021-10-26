<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\entity
 * @ORM\Table(name="users")
 */
class User
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     * @var DateTimeInterface
     */
    private $createdAt;

    // save current dateTime every time create a user
    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

   /** setters and getters */

    public function getId()
    {
        return $this->id;
    }


    public function getUserName()
    {
        return $this->username;
    }

    public function setUserName($userName): void
    {
        $this->username = $userName;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }



}