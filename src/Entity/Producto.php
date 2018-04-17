<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductoRepository")
 */
class Producto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="App\Entity\LineaComanda", cascade={"all"}, inversedBy="ide_producto")
     * @ORM\JoinColumn(name="LineaCom_id", referencedColumnName="id")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @var string
     * @ORM\Column(name="nombre", type="text", length=60)
     */
    private $nombre;

    /**
     * @var float
     * @ORM\Column(name="precio", type="decimal", scale=2)
     */
    private $precio;


    /**
     * @var integer
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

    /**
     * @return int
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param int $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo=$tipo;
    }


    /**
     * @var string
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre=$nombre;
    }

    /**
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     */
    public function setPrecio($precio)
    {
        $this->precio=$precio;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion=$descripcion;
    }



}
