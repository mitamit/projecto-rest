<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     *
     *
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
     * @var string
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LineaComanda", mappedBy="producto", cascade={"remove"})
     */
    private $lineasComanda;

    public function __construct()
    {
        $this->lineasComanda = new ArrayCollection();
    }

    /**
     * @param LineaComanda $lineaComanda
     * @return $this
     */
    public function addLineaCom(\App\Entity\LineaComanda $lineaComanda)
    {
        $this->lineasComanda[] = $lineaComanda;
        return $this;
    }

    /**
     * @param LineaComanda $lineaComanda
     *
     */
    public function removeLineaCom(\App\Entity\LineaComanda $lineaComanda)
    {
        $this->lineasComanda->removeElement($lineaComanda);
    }

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
