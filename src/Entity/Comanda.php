<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComandaRepository")
 */
class Comanda
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @var string
     * @ORM\Column(name="estado", type="text")
     */
    private $estado;

    /**
     * @var double
     * @ORM\Column(name="cuenta", type="decimal", scale=2)
     */
    private $cuenta;

    /**
     * @var integer
     * @ORM\Column(name="mesa", type="integer")
     */
    private $mesa;

    /**
     * @var string
     * @ORM\Column(name="camarero", type="text")
     */
    private $camarero;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Producto", mappedBy="comandas")
     */
    private $productos;
    public function __construct(\App\Entity\Producto $producto)
    {
        $this->productos = new ArrayCollection();
    }

    /**
     * @param Producto $producto
     * @return $this
     */
    public function addProducto(\App\Entity\Producto $producto)
    {
        $this->productos[] = $producto;
        return $this;
    }

    /**
     * @param Producto $producto
     */
    public function removeProducto(\App\Entity\Producto $producto)
    {
        $this->productos->removeElement($producto);
    }

    /**
     * @return float
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * @param float $cuenta
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta=$cuenta;
    }

    /**
     * @return int
     */
    public function getMesa()
    {
        return $this->mesa;
    }

    /**
     * @param int $mesa
     */
    public function setMesa($mesa)
    {
        $this->mesa=$mesa;
    }

    /**
     * @return string
     */
    public function getCamarero()
    {
        return $this->camarero;
    }

    /**
     * @param string $camarero
     */
    public function setCamarero($camarero)
    {
        $this->camarero=$camarero;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado=$estado;
    }





}
