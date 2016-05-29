<?php

namespace Amulen\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\PageBundle\Entity\MenuItemLabel as BaseMenuItemLabel;

/**
 * MenuItemLabel
 *
 * @ORM\Table(name="page_menu_item_label")
 * @ORM\Entity(repositoryClass="Amulen\PageBundle\Repository\MenuItemLabelRepository")
 */
class MenuItemLabel extends BaseMenuItemLabel
{
}
