<?php

namespace Amulen\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\ShopBundle\Entity\ProductOrder as BaseProductOrder;

/**
 * ProductOrder
 *
 * @ORM\Table(name="shop_order")
 * @ORM\Entity(repositoryClass="Amulen\ShopBundle\Repository\ProductOrderRepository")
 */
class ProductOrder extends BaseProductOrder
{
}
