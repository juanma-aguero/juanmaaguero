<?php

namespace Amulen\ClassificationBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Flowcode\ClassificationBundle\Entity\Tag as BaseTag;

/**
 * Tag
 *
 * @ORM\Table(name="classification_tag")
 * @ORM\Entity(repositoryClass="Amulen\ClassificationBundle\Repository\TagRepository")
 */
class Tag extends BaseTag
{
}
