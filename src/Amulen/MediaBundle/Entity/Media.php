<?php

namespace Amulen\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Flowcode\MediaBundle\Entity\Media as BaseMedia;

/**
 * Media
 *
 * @ORM\Table(name="media_media")
 * @ORM\Entity(repositoryClass="Amulen\MediaBundle\Repository\MediaRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Media extends BaseMedia
{
}
