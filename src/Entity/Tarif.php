<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TarifRepository")
 */
class Tarif
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $adult;

    /**
     * @ORM\Column(type="integer")
     */
    private $adultprice;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $chid;

    /**
     * @ORM\Column(type="integer")
     */
    private $childprice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdult(): ?string
    {
        return $this->adult;
    }

    public function setAdult(string $adult): self
    {
        $this->adult = $adult;

        return $this;
    }

    public function getAdultprice(): ?int
    {
        return $this->adultprice;
    }

    public function setAdultprice(int $adultprice): self
    {
        $this->adultprice = $adultprice;

        return $this;
    }

    public function getChid(): ?string
    {
        return $this->chid;
    }

    public function setChid(string $chid): self
    {
        $this->chid = $chid;

        return $this;
    }

    public function getChildprice(): ?int
    {
        return $this->childprice;
    }

    public function setChildprice(int $childprice): self
    {
        $this->childprice = $childprice;

        return $this;
    }
}
