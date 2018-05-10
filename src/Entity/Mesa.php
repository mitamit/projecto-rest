<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MesaRepository")
 */
class Mesa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\OneToMany(targetEntity="Comanda", mappedBy="mesa", cascade={"remove"})
     */
    private $comandas;
    public function __construct()
    {
        $this->comandas = new ArrayCollection();
    }


    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }
    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    /**
     * @return mixed
     */
    public function getComandas()
    {
        return $this->comandas;
    }
    /**
     * @param mixed $comandas
     */
    public function setComandas($comandas)
    {
        $this->comandas = $comandas;
    }
    public function calcularPrecio()
    {
        $cuenta = 0;
        foreach($this->comandas as $comanda)
        {
            $cuenta = $cuenta + $comanda->calculaCuenta();
        }
        $this->comandas = [];
        return $cuenta;
    }
    /**
     * @param Comanda $comanda
     * @return $this
     */
    public function addComanda(\App\Entity\Comanda $comanda)
    {
        $this->comandas[] = $comanda;
        return $this;
    }

    public function __toString()
    {
        return $this->getNumero();
    }
}
