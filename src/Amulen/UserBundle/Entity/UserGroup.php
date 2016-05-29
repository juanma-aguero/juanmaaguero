<?php

namespace Amulen\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\UserBundle\Entity\UserGroup as BaseUserGroup;

/**
 * Post
 *
 * @ORM\Table(name="user_group")
 * @ORM\Entity(repositoryClass="Amulen\UserBundle\Repository\UserGroupRepository")
 */
class UserGroup extends BaseUserGroup
{
}
