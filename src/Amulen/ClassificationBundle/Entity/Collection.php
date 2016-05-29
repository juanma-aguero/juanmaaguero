<?php

namespace Amulen\ClassificationBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Flowcode\ClassificationBundle\Entity\Collection as BaseCollection;

/**
 * Collection
 *
 * @ORM\Table(name="classification_collection")
 * @ORM\Entity(repositoryClass="Amulen/ClassificationBundle/Repository/CollectionRepository")
 */
class Collection extends BaseCollection
{
}
