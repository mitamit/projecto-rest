<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Comanda", cascade={"all"}, inversedBy="ide_mesa")
     * @ORM\JoinColumn(name="camanda_id", referencedColumnName="id")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @var bool
     * @ORM\Column(name="libre", type="boolean")
     */
    private $libre;

    /**
     * @return bool
     */
    public function isLibre()
    {
        return $this->libre;
    }

    /**
     * @param bool $libre
     */
    public function setLibre($libre)
    {
        $this->libre=$libre;
    }



}
