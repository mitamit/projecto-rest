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
     * @var integer
     * @ORM\Column(name="ide_comanda", type="integer")
     * @ORM\OneToMany(targetEntity="App\Entity\Comanda", mappedBy="id")
     */
    private $ide_comanda;

    /**
     * @var integer
     * @ORM\Column(name="ide_producto", type="integer")
     * @ORM\OneToMany(targetEntity="App\Entity\LineaComanda", mappedBy="id")
     */
    private $ide_producto;

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
     * @return int
     */
    public function getIdeComanda()
    {
        return $this->ide_comanda;
    }

    /**
     * @param int $ide_comanda
     */
    public function setIdeComanda($ide_comanda)
    {
        $this->ide_comanda=$ide_comanda;
    }

    /**
     * @return int
     */
    public function getIdeProducto()
    {
        return $this->ide_producto;
    }

    /**
     * @param int $ide_producto
     */
    public function setIdeProducto($ide_producto)
    {
        $this->ide_producto=$ide_producto;
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
