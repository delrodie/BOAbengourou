<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Annuaire
 *
 * @ORM\Table(name="annuaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnnuaireRepository")
 * @Vich\Uploadable
 */
class Annuaire
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="quartier", type="string", length=255, nullable=true)
     */
    private $quartier;

    /**
     * @var string
     *
     * @ORM\Column(name="situation", type="text", nullable=true)
     */
    private $situation;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=true)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="boitePostale", type="string", length=255, nullable=true)
     */
    private $boitePostale;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="cel", type="string", length=255, nullable=true)
     */
    private $cel;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="linked", type="string", length=255, nullable=true)
     */
    private $linked;

    /**
     * @var string
     *
     * @ORM\Column(name="google", type="string", length=255, nullable=true)
     */
    private $google;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="instagram", type="string", length=255, nullable=true)
     */
    private $instagram;

    /**
     * @var string
     *
     * @ORM\Column(name="pinterest", type="string", length=255, nullable=true)
     */
    private $pinterest;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=1000, nullable=true)
     */
    private $tag;

    /**
     * @var bool
     *
     * @ORM\Column(name="statut", type="boolean", nullable=true)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Domaine", inversedBy="annuaires")
     * @ORM\JoinColumn(name="domaine_id", referencedColumnName="id")
     */
     private $domaine;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="post_image", fileNameProperty="imageName", size="imageSize")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     * @var integer
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

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
     * @return Annuaire
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
     * Set quartier
     *
     * @param string $quartier
     *
     * @return Annuaire
     */
    public function setQuartier($quartier)
    {
        $this->quartier = $quartier;

        return $this;
    }

    /**
     * Get quartier
     *
     * @return string
     */
    public function getQuartier()
    {
        return $this->quartier;
    }

    /**
     * Set situation
     *
     * @param string $situation
     *
     * @return Annuaire
     */
    public function setSituation($situation)
    {
        $this->situation = $situation;

        return $this;
    }

    /**
     * Get situation
     *
     * @return string
     */
    public function getSituation()
    {
        return $this->situation;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     *
     * @return Annuaire
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set boitePostale
     *
     * @param string $boitePostale
     *
     * @return Annuaire
     */
    public function setBoitePostale($boitePostale)
    {
        $this->boitePostale = $boitePostale;

        return $this;
    }

    /**
     * Get boitePostale
     *
     * @return string
     */
    public function getBoitePostale()
    {
        return $this->boitePostale;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Annuaire
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set cel
     *
     * @param string $cel
     *
     * @return Annuaire
     */
    public function setCel($cel)
    {
        $this->cel = $cel;

        return $this;
    }

    /**
     * Get cel
     *
     * @return string
     */
    public function getCel()
    {
        return $this->cel;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return Annuaire
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set linked
     *
     * @param string $linked
     *
     * @return Annuaire
     */
    public function setLinked($linked)
    {
        $this->linked = $linked;

        return $this;
    }

    /**
     * Get linked
     *
     * @return string
     */
    public function getLinked()
    {
        return $this->linked;
    }

    /**
     * Set google
     *
     * @param string $google
     *
     * @return Annuaire
     */
    public function setGoogle($google)
    {
        $this->google = $google;

        return $this;
    }

    /**
     * Get google
     *
     * @return string
     */
    public function getGoogle()
    {
        return $this->google;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return Annuaire
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return Annuaire
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set instagram
     *
     * @param string $instagram
     *
     * @return Annuaire
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;

        return $this;
    }

    /**
     * Get instagram
     *
     * @return string
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * Set pinterest
     *
     * @param string $pinterest
     *
     * @return Annuaire
     */
    public function setPinterest($pinterest)
    {
        $this->pinterest = $pinterest;

        return $this;
    }

    /**
     * Get pinterest
     *
     * @return string
     */
    public function getPinterest()
    {
        return $this->pinterest;
    }

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return Annuaire
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set statut
     *
     * @param boolean $statut
     *
     * @return Annuaire
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Annuaire
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set imageSize
     *
     * @param integer $imageSize
     *
     * @return Annuaire
     */
    public function setImageSize($imageSize)
    {
        $this->imageSize = $imageSize;

        return $this;
    }

    /**
     * Get imageSize
     *
     * @return integer
     */
    public function getImageSize()
    {
        return $this->imageSize;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Annuaire
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Annuaire
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
     * @return Annuaire
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
     * @return Annuaire
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
     * @return Annuaire
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
     * @return Annuaire
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
     * Set domaine
     *
     * @param \AppBundle\Entity\Domaine $domaine
     *
     * @return Annuaire
     */
    public function setDomaine(\AppBundle\Entity\Domaine $domaine = null)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return \AppBundle\Entity\Domaine
     */
    public function getDomaine()
    {
        return $this->domaine;
    }
}
