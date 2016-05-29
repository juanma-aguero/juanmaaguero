<?php

namespace Amulen\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\PageBundle\Entity\MenuItem as BaseMenuItem;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MenuItem
 *
 * @Gedmo\Tree(type="nested")
 * @ORM\Table(name="page_menu_item")
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\NestedTreeRepository")
 */
class MenuItem extends BaseMenuItem
{
}
