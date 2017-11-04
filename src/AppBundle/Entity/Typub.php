<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Typub
 *
 * @ORM\Table(name="typub")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypubRepository")
 */
class Typub
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

     /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Publicite", mappedBy="typub")
     */
     private $publicites;


     /**
      * @var string
      *
      * @Gedmo\Slug(fields={"nom"})
      * @ORM\Column(name="slug", type="string", length=255)
      */
     private $slug;

     /**
      * @var string
      *
      * @Gedmo\Blameable(on="create")
      * @ORM\Column(name="publie_par", type="string", length=25, nullable=true)
      */
     private $publiePar;

     /**
      * @var string
      *
      * @Gedmo\Blameable(on="update")
      * @ORM\Column(name="modifie_par", type="string", length=25, nullable=true)
      */
     private $modifiePar;

     /**
      * @var \DateTime
      *
      * @Gedmo\Timestampable(on="create")
      * @ORM\Column(name="publie_le", type="datetimetz", nullable=true)
      */
     private $publieLe;

     /**
      * @var \DateTime
      *
      * @Gedmo\Timestampable(on="update")
      * @ORM\Column(name="modifie_le", type="datetimetz", nullable=true)
      */
     private $modifieLe;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Typub
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Typub
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set publiePar
     *
     * @param string $publiePar
     *
     * @return Typub
     */
    public function setPubliePar($publiePar)
    {
        $this->publiePar = $publiePar;

        return $this;
    }

    /**
     * Get publiePar
     *
     * @return string
     */
    public function getPubliePar()
    {
        return $this->publiePar;
    }

    /**
     * Set modifiePar
     *
     * @param string $modifiePar
     *
     * @return Typub
     */
    public function setModifiePar($modifiePar)
    {
        $this->modifiePar = $modifiePar;

        return $this;
    }

    /**
     * Get modifiePar
     *
     * @return string
     */
    public function getModifiePar()
    {
        return $this->modifiePar;
    }

    /**
     * Set publieLe
     *
     * @param \DateTime $publieLe
     *
     * @return Typub
     */
    public function setPublieLe($publieLe)
    {
        $this->publieLe = $publieLe;

        return $this;
    }

    /**
     * Get publieLe
     *
     * @return \DateTime
     */
    public function getPublieLe()
    {
        return $this->publieLe;
    }

    /**
     * Set modifieLe
     *
     * @param \DateTime $modifieLe
     *
     * @return Typub
     */
    public function setModifieLe($modifieLe)
    {
        $this->modifieLe = $modifieLe;

        return $this;
    }

    /**
     * Get modifieLe
     *
     * @return \DateTime
     */
    public function getModifieLe()
    {
        return $this->modifieLe;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->publicites = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add publicite
     *
     * @param \AppBundle\Entity\Publicite $publicite
     *
     * @return Typub
     */
    public function addPublicite(\AppBundle\Entity\Publicite $publicite)
    {
        $this->publicites[] = $publicite;

        return $this;
    }

    /**
     * Remove publicite
     *
     * @param \AppBundle\Entity\Publicite $publicite
     */
    public function removePublicite(\AppBundle\Entity\Publicite $publicite)
    {
        $this->publicites->removeElement($publicite);
    }

    /**
     * Get publicites
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPublicites()
    {
        return $this->publicites;
    }

    public function __toString() {
        return $this->getNom();
    }
}
