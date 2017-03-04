<?php

namespace TaskBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection; 


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
     * @ORM\OneToMany(targetEntity="Task", mappedBy="user")
     */
    private $tasks;
    
    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="user")
     */
    private $categories;
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     * @var type 
     */
    private $comments;


    public function __construct() {
        parent::__construct();
        $this->tasks = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }  


    public function addTask($tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    public function removeTask($tasks)
    {
        $this->tasks->removeElement($tasks);
    }


    public function getTasks()
    {
        return $this->tasks;
    }

    public function addCategory($categories)
    {
        $this->categories[] = $categories;

        return $this;
    }


    public function removeCategory($categories)
    {
        $this->categories->removeElement($categories);
    }

    public function getCategories()
    {
        return $this->categories;
    }


    public function addComment ($comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    public function removeComment($comments)
    {
        $this->comments->removeElement($comments);
    }

    public function getComments()
    {
        return $this->comments;
    }
}