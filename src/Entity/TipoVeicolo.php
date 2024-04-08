<?php

namespace App\Entity;

use App\Repository\TipoVeicoloRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoVeicoloRepository::class)
 */
class TipoVeicolo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $tipo_desc;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoDesc(): ?string
    {
        return $this->tipo_desc;
    }

    public function setTipoDesc(string $tipo_desc): self
    {
        $this->tipo_desc = $tipo_desc;

        return $this;
    }

}
