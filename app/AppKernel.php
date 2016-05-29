<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            /* libs */
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Sonata\SeoBundle\SonataSeoBundle(),
            new Symfony\Cmf\Bundle\SeoBundle\CmfSeoBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new FM\ElfinderBundle\FMElfinderBundle(),
            new Liip\ImagineBundle\LiipImagineBundle(),
            new Flowcode\NotificationBundle\FlowcodeNotificationBundle(),

            /* amulen updateables */
            new Flowcode\ClassificationBundle\FlowcodeClassificationBundle(),
            new Flowcode\MediaBundle\FlowcodeMediaBundle(),
            new Flowcode\NewsBundle\FlowcodeNewsBundle(),
            new Flowcode\UserBundle\FlowcodeUserBundle(),
            new Flowcode\PageBundle\FlowcodePageBundle(),
            new Flowcode\ShopBundle\FlowcodeShopBundle(),
            new Flowcode\DashboardBundle\FlowcodeDashboardBundle(),

            /* amulen local */
            new Amulen\ClassificationBundle\AmulenClassificationBundle(),
            new Amulen\MediaBundle\AmulenMediaBundle(),
            new Amulen\NewsBundle\AmulenNewsBundle(),
            new Amulen\PageBundle\AmulenPageBundle(),
            new Amulen\DashboardBundle\AmulenDashboardBundle(),
            new Amulen\UserBundle\AmulenUserBundle(),
            new Amulen\ShopBundle\AmulenShopBundle(),

            /* your bundles */
            new AppBundle\AppBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
            $bundles[] = new PUGX\GeneratorBundle\PUGXGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
