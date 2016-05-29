<?php
namespace Amulen\DashboardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Amulen\PageBundle\Entity\Page;
use Amulen\PageBundle\Entity\Menu;
use Amulen\PageBundle\Entity\MenuItem;

/**
 * Description of LoadUserData
 *
 * @author Juan Manuel Agüero <jaguero@flowcode.com.ar>
 */
class LoadPageData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /* Create Homepage */
        $homepage = new Page();
        $homepage->setName("Homepage");
        $homepage->setDescription("Default Homepage.");
        $homepage->setTemplate("FlowcodePageBundle:Page:default.html.twig");
        $homepage->setEnabled(true);
        $manager->persist($homepage);
        $this->addReference("page_homepage", $homepage);

        /* Example page */
        $page_example = new Page();
        $page_example->setName("Example");
        $page_example->setDescription("Example default page");
        $page_example->setTemplate("FlowcodePageBundle:Page:default.html.twig");
        $page_example->setEnabled(true);
        $manager->persist($page_example);
        $this->addReference("page_example", $page_example);

        /* Products page */
        $page_products = new Page();
        $page_products->setName("Products");
        $page_products->setDescription("Example products index page.");
        $page_products->setTemplate("FlowcodeShopBundle:Product:product_index.html.twig");
        $page_products->setEnabled(true);
        $manager->persist($page_products);
        $this->addReference("page_products", $page_products);

        /* Create Main Menu */
        $menuMain = new Menu();
        $menuMain->setName("Main Menu");
        $menuMain->setEnabled(true);
        $manager->persist($menuMain);
        $this->addReference("menu_main", $menuMain);

        /* set root item */
        $rootItem = new MenuItem();
        $rootItem->setName($menuMain->getName()." Root Item");
        $rootItem->setIsRoot(true);
        $rootItem->setMenu($menuMain);
        $manager->persist($rootItem);

        $exampl1Item = new MenuItem();
        $exampl1Item->setName("Example Page");
        $exampl1Item->setMenu($menuMain);
        $exampl1Item->setPage($page_example);
        $exampl1Item->setParent($rootItem);
        $manager->persist($exampl1Item);

        $exampl2Item = new MenuItem();
        $exampl2Item->setName("Products");
        $exampl2Item->setMenu($menuMain);
        $exampl2Item->setPage($page_products);
        $exampl2Item->setParent($rootItem);
        $manager->persist($exampl2Item);

        $manager->flush();
    }
    public function getOrder()
    {
        return 3;
    }
}
