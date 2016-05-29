<?php

namespace Amulen\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\UserBundle\Entity\User as BaseUser;

/**
 * Post
 *
 * @ORM\Table(name="user_user")
 * @ORM\Entity(repositoryClass="Amulen\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
}
