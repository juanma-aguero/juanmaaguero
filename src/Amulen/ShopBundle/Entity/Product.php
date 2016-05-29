<?php

namespace Amulen\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\ShopBundle\Entity\Product as BaseProduct;


/**
 * Product
 *
 * @ORM\Table(name="shop_product")
 * @ORM\Entity(repositoryClass="\Amulen\ShopBundle\Repository\ProductRepository")
 */
class Product extends BaseProduct
{
}
