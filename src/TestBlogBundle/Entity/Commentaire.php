<?php

namespace TestBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="TestBlogBundle\Repository\CommentaireRepository")
 */
class Commentaire
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
     * @ORM\Column(name="contenu", type="text", nullable=true)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="TestBlogBundle\Entity\user", inversedBy="commentaires", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
     private $user;

     /**
      * @ORM\ManyToOne(targetEntity="TestBlogBundle\Entity\Article", inversedBy="commentaires", cascade={"persist"})
      * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
      */
      private $article;

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
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Commentaire
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Commentaire
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set user
     *
     * @param \TestBlogBundle\Entity\user $user
     *
     * @return Commentaire
     */
    public function setUser(\TestBlogBundle\Entity\user $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TestBlogBundle\Entity\user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set article
     *
     * @param \TestBlogBundle\Entity\Article $article
     *
     * @return Commentaire
     */
    public function setArticle(\TestBlogBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \TestBlogBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }
}
