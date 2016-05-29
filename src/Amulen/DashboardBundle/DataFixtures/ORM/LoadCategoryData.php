<?php
namespace Amulen\DashboardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Amulen\ClassificationBundle\Entity\Category;

/**
 * Description of LoadUserData
 *
 * @author Juan Manuel Agüero <jaguero@flowcode.com.ar>
 */
class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /* Create defaults categories  */
        $cat_product = new Category();
        $cat_product->setName("product");
        $manager->persist($cat_product);
        $this->addReference("cat_product", $cat_product);

        /* Create products categories  */
        $cat_prod_1 = new Category();
        $cat_prod_1->setName("prod category 1");
        $cat_prod_1->setParent($cat_product);
        $manager->persist($cat_prod_1);
        $this->addReference("cat_prod_1", $cat_prod_1);

        $cat_prod_2 = new Category();
        $cat_prod_2->setName("prod category 2");
        $cat_prod_2->setParent($cat_product);
        $manager->persist($cat_prod_2);
        $this->addReference("cat_prod_2", $cat_prod_2);
        $manager->flush();
    }
    public function getOrder()
    {
        return 1;
    }
}
