<?php
namespace Amulen\DashboardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Amulen\PageBundle\Entity\Page;
use Amulen\PageBundle\Entity\Block;

/**
 * Description of LoadUserData
 *
 * @author Juan Manuel Agüero <jaguero@flowcode.com.ar>
 */
class LoadPageBlockData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /* Create Homepage blocks */
        $homepage_block = new Block();
        $homepage_block->setName("welcome");
        $homepage_block->setType("type_text");
        $homepage_block->setContent("welcome");
        $homepage_block->setPage($this->getReference("page_homepage"));
        $manager->persist($homepage_block);
        $manager->flush();
    }
    public function getOrder()
    {
        return 4;
    }
}
