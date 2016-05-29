<?php

namespace Amulen\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\ShopBundle\Entity\ProductOrderItem as BaseProductOrderItem;

/**
 * ProductOrderItem
 *
 * @ORM\Table(name="shop_order_item")
 * @ORM\Entity(repositoryClass="Amulen\ShopBundle\Repository\ProductItemRepository")
 */
class ProductOrderItem extends BaseProductOrderItem
{
}
