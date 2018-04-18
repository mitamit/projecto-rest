<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LineaComandaRepository")
 */
class LineaComanda
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Comanda", inversedBy="lineaComandas")
     */
    private $comanda;

    /**
     * @return \App\Entity\Comanda
     */
    public function getComanda()
    {
        return $this->comanda;
    }

    /**
     * @param \App\Entity\Comanda $comanda
     * @return LineaComanda
     */
    public function setComanda($comanda)
    {
        $this->comanda=$comanda;
        return $this;
    }


    /**
     * @var string
     * @ORM\Column(name="estado", type="text", length=60)
     */
    private $estado;

    /**
     * @var integer
     * @ORM\Column(name="prioridad", type="integer")
     */
    private $prioridad;

    /**
     * @var string
     * @ORM\Column(name="comentario", type="text", length=100)
     */
    private $comentario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Producto", inversedBy="lineasComanda")
     */
    private $producto;

    /**
     * @return mixed
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * @param mixed $producto
     */
    public function setProducto($producto)
    {
        $this->producto=$producto;
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

    /**
     * @return int
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * @param int $prioridad
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad=$prioridad;
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario=$comentario;
    }


}
