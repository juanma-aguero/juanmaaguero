<?php

namespace Amulen\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\UserBundle\Entity\Role as BaseRole;

/**
 * Post
 *
 * @ORM\Table(name="user_role")
 * @ORM\Entity(repositoryClass="Amulen\UserBundle\Repository\RoleRepository")
 */
class Role extends BaseRole
{
}
