<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;

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
     * @ORM\Column(type="string", length=50)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $website;

    /**
     * @ManyToMany(targetEntity="User", mappedBy="contacts")
     */
    protected $contactsWithMe;

    /**
     * @ManyToMany(targetEntity="User", inversedBy="contactsWithMe")
     * @JoinTable(name="contacts", 
     *            joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *            inverseJoinColumns={@JoinColumn(name="contact_user_id", referencedColumnName="id")})
     */
    protected $contacts;

    public function __construct() {
        parent::__construct();
        $this->contactsWithMe = new ArrayCollection();
        $this->contacts = new ArrayCollection();
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

    function getContactsWithMe() {
        return $this->contactsWithMe;
    }

    function addContactsWithMe(User $idcontact) {
        $this->contactsWithMe[] = $idcontact;
        return $this;
    }

    function removeContactsWithMe(User $idcontact) {
        $this->contactsWithMe->removeElement($idcontact);
        return $this;
    }

    function getContacts() {
        return $this->contacts;
    }

    function addContacts(User $idcontact) {
        $this->contacts[] = $idcontact;
        return $this;
    }

    function removeContacts(User $idcontact) {
        $this->contacts->removeElement($idcontact);
        return $this;
    }

}
