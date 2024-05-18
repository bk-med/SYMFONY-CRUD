<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Livre
 *
 * @ORM\Table(name="livre", indexes={@ORM\Index(name="IDX_AC634F9960BB6FE6", columns={"auteur_id"})})
 * @ORM\Entity
 */
class Livre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_livre", type="string", length=255, nullable=false)
     */
    private $nomLivre;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="ouvrage", type="string", length=255, nullable=false)
     */
    private $ouvrage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee_publication", type="date", nullable=false)
     */
    private $anneePublication;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var \Auteur
     *
     * @ORM\ManyToOne(targetEntity="Auteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="auteur_id", referencedColumnName="id")
     * })
     */
    private $auteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomLivre(): ?string
    {
        return $this->nomLivre;
    }

    public function setNomLivre(string $nomLivre): static
    {
        $this->nomLivre = $nomLivre;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getOuvrage(): ?string
    {
        return $this->ouvrage;
    }

    public function setOuvrage(string $ouvrage): static
    {
        $this->ouvrage = $ouvrage;

        return $this;
    }

    public function getAnneePublication(): ?\DateTimeInterface
    {
        return $this->anneePublication;
    }

    public function setAnneePublication(\DateTimeInterface $anneePublication): static
    {
        $this->anneePublication = $anneePublication;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getAuteur(): ?Auteur
    {
        return $this->auteur;
    }

    public function setAuteur(?Auteur $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }


}
