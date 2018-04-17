<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CamareroRepository")
 */
class Camarero
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="App\Entity\Comanda", cascade={"all"}, inversedBy="ide_camarero")
     * @ORM\JoinColumn(name="camanda_id", referencedColumnName="id")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @var string
     * @ORM\Column(name="nombre", type="string", length=60)
     *
     */
    private $nombre;

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre=$nombre;
    }


}
