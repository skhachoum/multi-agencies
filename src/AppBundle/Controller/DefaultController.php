<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {   $services = [];
        $portfolios = [];
        $team = [];
        $setting = null;
        $slogan = null;
        $about = null;
        //default
        $dbname = 'multidb_nore';
        
        $em = $this->get('doctrine.orm.tenant_entity_manager');

        if($this->get('doctrine.dbal.tenant_connection')->isConnected())
        {
            $dbname = $this->get('doctrine.dbal.tenant_connection')->getDatabase();
            $name = explode('_', $dbname);
            $name = $name[1];
            $setting = $em->getRepository('AgenceBundle:Setting')->findOneBy(['isCurrent' => true]);
            $slogan = $setting->getSlogan();
            $about = $setting->getDescription();
            
            $services = $em->getRepository('AgenceBundle:Service')->findAll();
            $portfolios = $em->getRepository('AgenceBundle:Portfolio')->findAll();
            $team = $em->getRepository('AgenceBundle:Team')->findAll();

        }
        return $this->render('default/index.html.twig', [
            'tenants' => $this->get('app_bundle.repository.tenant')->findAll(),
            'name' => $name,
            'slogan' => $slogan,
            'about' => $about,
            'services' => $services,
            'portfolios' => $portfolios,
            'team' => $team,

        ]);
    }
}
