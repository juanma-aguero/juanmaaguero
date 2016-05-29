<?php

namespace Amulen\ClassificationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Flowcode\ClassificationBundle\Entity\Category as BaseCategory;

/**
 * Category
 *
 * @Gedmo\Tree(type="nested")
 * @ORM\Table(name="classification_category")
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\NestedTreeRepository")
 */
class Category extends BaseCategory
{
}
