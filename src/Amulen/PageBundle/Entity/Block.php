<?php

namespace Amulen\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\PageBundle\Entity\Block as BaseBlock;

/**
 * Block
 *
 * @ORM\Table(name="page_block")
 * @ORM\Entity(repositoryClass="Amulen\PageBundle\Repository\BlockRepository")
 */
class Block extends BaseBlock {



}
