<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\LineaComanda", cascade={"all"}, inversedBy="ide_comanda")
     * @ORM\JoinColumn(name="LineaCom_id", referencedColumnName="id")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @var integer
     * @ORM\Column(name="ide_mesa", type="integer")
     * @ORM\OneToMany(targetEntity="App\Entity\Mesa", mappedBy="id")
     *
     */
    private $ide_mesa;

    /**
     * @var integer
     * @ORM\Column(name="ide_camarero", type="integer")
     * @ORM\OneToMany(targetEntity="App\Entity\Camarero", mappedBy="id")
     */
    private $ide_camarero;

    /**
     * @var string
     * @ORM\Column(name="estado", type="text")
     */
    private $estado;

    /**
     * @return int
     */
    public function getIdeMesa()
    {
        return $this->ide_mesa;
    }

    /**
     * @param int $ide_mesa
     */
    public function setIdeMesa($ide_mesa)
    {
        $this->ide_mesa=$ide_mesa;
    }

    /**
     * @return int
     */
    public function getIdeCamarero()
    {
        return $this->ide_camarero;
    }

    /**
     * @param int $ide_camarero
     */
    public function setIdeCamarero($ide_camarero)
    {
        $this->ide_camarero=$ide_camarero;
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
