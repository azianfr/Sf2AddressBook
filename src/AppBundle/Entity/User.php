<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $address;

    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $website;

    public function __construct() {
        parent::__construct();
        // your own logic
    }

    function getAddress() {
        return $this->address;
    }

    function setAddress($address) {
        $this->address = $address;

        return $this;
    }

    function getPhone() {
        return $this->phone;
    }

    function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    function getWebsite() {
        return $this->website;
    }

    function setWebsite($website) {
        $this->website = $website;

        return $this;
    }

}
