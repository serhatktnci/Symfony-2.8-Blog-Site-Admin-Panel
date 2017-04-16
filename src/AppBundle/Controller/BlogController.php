<?php
// src/AppBundle/Controller/BlogController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class BlogController extends Controller
{
    /**
     * Matches /blog exactly
     *
     * @Route("/blog", name="blog_list")
     */
    public function listAction($id)
    {

        $request = $this->getRequest();
    
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('AppBundle:Category')->findAll();

        $articles = $em->getRepository('AppBundle:Article')->findBy(array('category'=>$id));

        $articles_pagination  = $this->get('knp_paginator')->paginate($articles,$request->query->getInt('page', 1),10);

     return $this->render('blog/list.html.twig', array(
            'categories' => $categories,
            'articles' => $articles_pagination
        ));
    }

    /**
     * Matches /blog/*
     *
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function showAction($slug)
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        $article = $em->getRepository('AppBundle:Article')->findOneBySlug($slug);

     return $this->render('blog/show.html.twig', array(
            'categories' => $categories,
            'article' => $article
        ));

    }

    public function searchAction(Request $request) {
    if ($request->getMethod() == 'GET') {
        $title = $request->get('Search_term');
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        $repo = $em->getRepository('AppBundle:Article');
        $query = $repo->createQueryBuilder('a')
               ->where('a.name LIKE :name')
               ->setParameter('name', '%'.$title.'%')
               ->getQuery();

        $adverts = $query->getResult();


    }
    return $this->render('blog/search.html.twig', array('adverts' => $adverts, 'categories' => $categories));
}

}?>