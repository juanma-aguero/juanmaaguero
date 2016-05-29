<?php

namespace Amulen\DashboardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Amulen\UserBundle\Entity\User;
use Amulen\UserBundle\Entity\Role;
use Amulen\UserBundle\Entity\UserGroup;
/**
 * Description of LoadUserData
 *
 * @author Juan Manuel Agüero <jaguero@flowcode.com.ar>
 */
class LoadUserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface {
    /**
     * @var ContainerInterface
     */
    private $container;
    public function load(ObjectManager $manager) {

        $encoder = $this->container->get('security.password_encoder');

        /* Create default roles */
        $roleAdmin = new Role();
        $roleAdmin->setName("ROLE_ADMIN");
        $manager->persist($roleAdmin);

        /* Create admin user group */
        $adminUserGroup = new UserGroup("administrators");
        $adminUserGroup->addRole($roleAdmin);
        $manager->persist($adminUserGroup);

        /* Create a new user 1 */
        $admin1 = new User();
        $admin1->setUsername('admin1');
        $admin1->setEmail('admin1@mail.com');
        $admin1->setPassword($encoder->encodePassword($admin1, "admin1"));
        $admin1->setStatus(1);
        $admin1->addUserGroup($adminUserGroup);

        $manager->persist($admin1);

        /* Create a new user 1 */
        $user1 = new User();
        $user1->setUsername('user1');
        $user1->setEmail('user1@mail.com');
        $user1->setPassword($encoder->encodePassword($user1, "user1"));
        $user1->setStatus(1);
        $manager->persist($user1);

        $manager->flush();

    }
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }
    public function getOrder() {
        return 2;
    }
}
