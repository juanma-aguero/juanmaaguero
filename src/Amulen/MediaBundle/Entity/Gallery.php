<?php

namespace Amulen\MediaBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Flowcode\MediaBundle\Entity\Gallery as BaseGallery;

/**
 * Gallery
 *
 * @ORM\Table(name="media_gallery")
 * @ORM\Entity(repositoryClass="Amulen\MediaBundle\Repository\GalleryRepository")
 */
class Gallery extends BaseGallery
{
}
