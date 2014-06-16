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
        $form = $this->createForm(new SearchType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->get('search')->getData();
            json_encode($data);
            exec('SEClient', $result, $error);
            if (isset($result[0])){
                $result = json_decode($result[0]);
                var_dump($result);
            }
        }
        return array(
            'form' => $form->createView(),
            'error' => !($error == 0),
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
        $form = $this->createForm(new SubmitType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->get('url')->getData();
            json_encode($data);
            exec('SEClient', $url, $error);
            if (isset($url[0])){
                $url = json_decode($url[0]);
                var_dump($url);
            }
        }
        return array(
            'form' => $form->createView(),
            'error' => !($error == 0),
        );
    }
}