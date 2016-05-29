<?php

namespace Amulen\DashboardBundle\Command;

use Sensio\Bundle\GeneratorBundle\Manipulator\KernelManipulator;
use Sensio\Bundle\GeneratorBundle\Manipulator\RoutingManipulator;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * User: juanma
 * Date: 5/28/16
 * Time: 10:47 AM
 */
class PluginRegisterCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('amulen:plugin:register')
            ->setDescription('Register plugin')
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                'What plugin do you want to register?'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $pluginName = $input->getArgument('name');

        $bundle = new $pluginName();

        $kernel = $this->getContainer()->get('kernel');


        $this->updateKernel($output, $kernel, $bundle);
        $this->updateRouting($output, $bundle);

        $output->writeln("done");
    }

    protected function updateKernel(OutputInterface $output, KernelInterface $kernel, Bundle $bundle)
    {

        $kernelManipulator = new KernelManipulator($kernel);

        $output->write(sprintf(
            '> Enabling the bundle <info>%s</info>: ', $bundle->getNamespace()
        ));
        try {
            $ret = $kernelManipulator->addBundle(get_class($bundle));

            if (!$ret) {
                $reflected = new \ReflectionObject($kernel);

                return array(
                    sprintf('- Edit <comment>%s</comment>', $reflected->getFilename()),
                    '  and add the following bundle in the <comment>AppKernel::registerBundles()</comment> method:',
                    '',
                    sprintf('    <comment>new %s(),</comment>', get_class($bundle)),
                    '',
                );
            }
        } catch (\RuntimeException $e) {
            return array(
                sprintf('Bundle <comment>%s</comment> is already defined in <comment>AppKernel::registerBundles()</comment>.', get_class($bundle)),
                '',
            );
        }
    }

    protected function updateRouting(OutputInterface $output, Bundle $bundle)
    {
        $targetRoutingPath = $this->getContainer()->getParameter('kernel.root_dir') . '/config/routing.yml';
        $output->write(sprintf(
            '> Importing the bundle\'s routes from the <info>%s</info> file: ',
            $this->makePathRelative($targetRoutingPath)
        ));
        $routing = new RoutingManipulator($targetRoutingPath);
        try {
            $ret = $routing->addResource($bundle->getName(), 'annotation');
            if (!$ret) {
                if ('annotation' === 'annotation') {
                    $help = sprintf("        <comment>resource: \"@%s/Controller/\"</comment>\n        <comment>type:     annotation</comment>\n", $bundle->getName());
                } else {
                    $help = sprintf("        <comment>resource: \"@%s/Resources/config/routing.%s\"</comment>\n", $bundle->getName(), $bundle->getConfigurationFormat());
                }
                $help .= "        <comment>prefix:   /</comment>\n";

                return array(
                    '- Import the bundle\'s routing resource in the app\'s main routing file:',
                    '',
                    sprintf('    <comment>%s:</comment>', $bundle->getName()),
                    $help,
                    '',
                );
            }
        } catch (\RuntimeException $e) {
            return array(
                sprintf('Bundle <comment>%s</comment> is already imported.', $bundle->getName()),
                '',
            );
        }
    }

    protected function updateConfiguration(OutputInterface $output, Bundle $bundle)
    {
        $targetConfigurationPath = $this->getContainer()->getParameter('kernel.root_dir') . '/config/config.yml';
        $output->write(sprintf(
            '> Importing the bundle\'s %s from the <info>%s</info> file: ',
            $bundle->getServicesConfigurationFilename(),
            $this->makePathRelative($targetConfigurationPath)
        ));
        $manipulator = new ConfigurationManipulator($targetConfigurationPath);
        try {
            $manipulator->addResource($bundle);
        } catch (\RuntimeException $e) {
            return array(
                '- Import the bundle\'s %s resource in the app\'s main configuration file:',
                '',
                $manipulator->getImportCode($bundle),
                '',
            );
        }
    }

    /**
     * Tries to make a path relative to the project, which prints nicer.
     *
     * @param string $absolutePath
     *
     * @return string
     */
    protected function makePathRelative($absolutePath)
    {
        $projectRootDir = dirname($this->getContainer()->getParameter('kernel.root_dir'));

        return str_replace($projectRootDir . '/', '', realpath($absolutePath) ?: $absolutePath);
    }

}