<?php

namespace Amulen\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\NewsBundle\Entity\Post as BasePost;

/**
 * Post
 *
 * @ORM\Table(name="news_post")
 * @ORM\Entity(repositoryClass="Amulen\NewsBundle\Repository\PostRepository")
 */
class Post extends BasePost
{
}
