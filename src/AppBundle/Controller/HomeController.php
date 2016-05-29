<?php

namespace AppBundle\Controller;

use Flowcode\DashboardBundle\Entity\Setting;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/{_locale}/", name="home")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $siteName = $em->getRepository('FlowcodeDashboardBundle:Setting')->findOneBy(array(
            'name' => Setting::SITE_NAME,
        ));
        $siteHome = $em->getRepository('FlowcodeDashboardBundle:Setting')->findOneBy(array(
            'name' => Setting::HOME_SLUG,
        ));

        $entity = $em->getRepository('AmulenPageBundle:Page')->findOneBy(array(
            'slug' => $siteHome->getValue(),
        ));
        $entity->setViewCount($entity->getViewCount() + 1);
        $em->flush();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }
        $id = $entity->getId();

        $locale = $request->getLocale();
        $seoPage = $this->container->get('sonata.seo.page');


        /* description */
        $description = $em->getRepository('AmulenPageBundle:Block')->findOneBy(array('page' => $id, 'name' => "description", "lang" => $locale));
        if ($description) {
            $pageDescription = $description->getContent();
        } else {
            $pageDescription = $entity->getDescription();
        }

        $seoPage
            ->setTitle($siteName->getValue())
            ->addMeta('name', 'description', $pageDescription)
            ->addMeta('property', 'og:description', $pageDescription);
        return $this->render($entity->getTemplate(), array('page' => $entity, 'parameterBag' => $request->query->all()));
    }
}
