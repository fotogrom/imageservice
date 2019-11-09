<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="picture")
 */
class Picture
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="picname", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Folder")
     * @ORM\JoinColumn(name="folderid",referencedColumnName="id")
     */
    protected $folder;

    /**
     * @ORM\Column(name="origwidth",type="integer")
     */
    protected $origwidth;

    /**
     * @ORM\Column(name="origheight",type="integer")
     */
    protected $origheight;

    /**
     * @ORM\Column(name="volume",type="integer")
     */
    protected $volume;

    /**
     * @ORM\Column(name="size1",type="string",length=64)
     */
    protected $size1;

    /**
     * @ORM\Column(name="size2",type="string",length=64)
     */
    protected $size2;

    /**
     * @ORM\Column(name="size3",type="string",length=64)
     */
    protected $size3;

    /**
     * @ORM\Column(name="created_at",type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at",type="datetime")
     */
    protected $updatedAt;

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
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * @param mixed $folder
     */
    public function setFolder($folder): void
    {
        $this->folder = $folder;
    }

    /**
     * @return mixed
     */
    public function getOrigwidth()
    {
        return $this->origwidth;
    }

    /**
     * @param mixed $origwidth
     */
    public function setOrigwidth($origwidth): void
    {
        $this->origwidth = $origwidth;
    }

    /**
     * @return mixed
     */
    public function getOrigheight()
    {
        return $this->origheight;
    }

    /**
     * @param mixed $origheight
     */
    public function setOrigheight($origheight): void
    {
        $this->origheight = $origheight;
    }

    /**
     * @return mixed
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param mixed $volume
     */
    public function setVolume($volume): void
    {
        $this->volume = $volume;
    }

    /**
     * @return mixed
     */
    public function getSize1()
    {
        return $this->size1;
    }

    /**
     * @param mixed $size1
     */
    public function setSize1($size1): void
    {
        $this->size1 = $size1;
    }

    /**
     * @return mixed
     */
    public function getSize2()
    {
        return $this->size2;
    }

    /**
     * @param mixed $size2
     */
    public function setSize2($size2): void
    {
        $this->size2 = $size2;
    }

    /**
     * @return mixed
     */
    public function getSize3()
    {
        return $this->size3;
    }

    /**
     * @param mixed $size3
     */
    public function setSize3($size3): void
    {
        $this->size3 = $size3;
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
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Hook on pre-persist operations.
     */
    public function prePersist(): void
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }
    /**
     * Hook on pre-update operations.
     */
    public function preUpdate(): void
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->getName();
    }
}