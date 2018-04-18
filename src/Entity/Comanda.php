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
     * @return mixed
     */
    public function getLineaComandas()
    {
        return $this->lineasComanda;
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
     * @ORM\OneToMany(targetEntity="App\Entity\LineaComanda", mappedBy="comanda", cascade={"remove"})
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
     */
    public function removeLineaCom(\App\Entity\LineaComanda $lineaComanda)
    {
        $this->lineasComanda->removeElement($lineaComanda);
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
