<?php

namespace Amulen\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Flowcode\PageBundle\Entity\Page as BasePage;

/**
 * Page
 *
 * @ORM\Table(name="page_page")
 * @ORM\Entity(repositoryClass="Amulen\PageBundle\Repository\PageRepository")
 */
class Page extends BasePage
{
}
