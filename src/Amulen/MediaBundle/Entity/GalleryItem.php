<?php

namespace Amulen\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\MediaBundle\Entity\GalleryItem as BaseGalleryItem;

/**
 * GalleryItem
 *
 * @ORM\Table(name="media_gallery_item")
 * @ORM\Entity
 */
class GalleryItem extends BaseGalleryItem
{
}
