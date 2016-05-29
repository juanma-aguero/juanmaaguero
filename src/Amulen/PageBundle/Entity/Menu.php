<?php

namespace Amulen\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\PageBundle\Entity\Menu as BaseMenu;

/**
 * Menu
 *
 * @ORM\Table(name="page_menu")
 * @ORM\Entity(repositoryClass="Amulen\PageBundle\Repository\MenuRepository")
 */
class Menu extends BaseMenu
{
}
