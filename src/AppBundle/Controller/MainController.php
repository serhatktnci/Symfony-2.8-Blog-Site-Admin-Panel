<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $request = $this->getRequest();
    
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('AppBundle:Category')->findAll();

        $articles = $em->getRepository('AppBundle:Article')->findAll();

        $articles_pagination  = $this->get('knp_paginator')->paginate($articles,$request->query->getInt('page', 1),4);

        // replace this example code with whatever you need
        return $this->render('layout/index.html.twig', array(
            'categories' => $categories,
            'articles' => $articles_pagination
        ));
    }

}
