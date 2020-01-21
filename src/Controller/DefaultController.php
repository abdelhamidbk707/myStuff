<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractBaseController
{

    /**
     * @Route("/{slug}")
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index($slug)
    {
        return $this->render('article/show.html.twig', ['title' => $slug]);
    }

    /**
     * Route("/{slug}/heart")
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getHearts($slug)
    {
    }
}