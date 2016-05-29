<?php

namespace Amulen\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\MediaBundle\Entity\MediaType as BaseMediaType;

/**
 * MediaType
 *
 * @ORM\Table(name="media_media_type")
 * @ORM\Entity
 */
class MediaType extends BaseMediaType
{
}
