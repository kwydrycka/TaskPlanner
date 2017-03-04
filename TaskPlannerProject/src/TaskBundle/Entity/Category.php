<?php

namespace TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="TaskBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=70)
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="categories")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @var type 
     */
    private $user;
    
    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="category")
     * @var type 
     */
    private $tasks;

    /**
     * Get id
     *
     * @return integer 
     */
    
    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
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
    
      public function setUser($user = null)
    {
        $this->user = $user;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }
}
