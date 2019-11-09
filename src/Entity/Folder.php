<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="folder")
 */
class Folder
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="foldername", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="ownerid",referencedColumnName="id")
     */
    protected $owner;

    /**
     * @ORM\Column(name="categoryId", type="integer", nullable=true)
     */
    protected $category;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Hook on pre-persist operations.
     */
    public function prePersist(): void
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->getName();
    }
}
