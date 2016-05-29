<?php

namespace Amulen\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\ShopBundle\Entity\Brand as BaseBrand;

/**
 * Brand
 *
 * @ORM\Table(name="shop_brand")
 * @ORM\Entity(repositoryClass="\Amulen\ShopBundle\Repository\BrandRepository")
 */
class Brand extends BaseBrand
{
    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Brand
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }
}

