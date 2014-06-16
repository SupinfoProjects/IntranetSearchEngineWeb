<?php

namespace wdhif\SEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\False;
use wdhif\SEBundle\Form\SearchType;
use wdhif\SEBundle\Form\SubmitType;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="search")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $error = false;
        $form = $this->createForm(new SearchType()); // Search for SEClient
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->get('search')->getData(); // Form result in $data
            if ($data != null){
                $data = preg_replace("/[^a-z0-9]+/i", ";",  $data); // REGEX to replace ; to " "
                $data = "search:" . $data; // command for SEClient "search:"
            }
        var_dump($data); // var_dump test
        }
        return array(
            'form' => $form->createView(),
            'error' => !($error == 0), // If Error, return 1
        );
    }
    /**
     * @Route("/result", name="result")
     * @Template()
     */
    public function resultAction()
    {
        $pages = array();
        $page = "";
        for($i=0; $i < 42; $i++){
            $pages[] = $page;
        }
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $pages,
            $this->get('request')->query->get('page', 1)/*page number*/,
            $this->get('request')->query->get('limit', 10)/*limit per page*/
        );
        return array("pagination" => $pagination );
    }
    /**
     * @Route("/submit", name="submit")
     * @Template()
     */
    public function submitAction(Request $request)
    {
        $error = false;
        $form = $this->createForm(new SubmitType()); // Submit form for the url crawler
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->get('url')->getData();
            //exec('SEClient', $url, $error);
            if ($data != null){
                $data = "submit:" . $data; // command for SEClient "submit:"
            }
            var_dump($data); // var_dump test
        }
        return array(
            'form' => $form->createView(),
            'error' => !($error == 0),
        );
    }
}