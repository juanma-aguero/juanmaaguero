<?php

namespace Amulen\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\ShopBundle\Entity\ProductOrderStatus as BaseProductOrderStatus;

/**
 * ProductOrderStatus
 *
 * @ORM\Table("shop_order_status")
 * @ORM\Entity(repositoryClass="Amulen\ShopBundle\Repository\ProductOrderStatusRepository")
 */
class ProductOrderStatus extends BaseProductOrderStatus
{
}
