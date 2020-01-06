<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Main2Controller extends AbstractController
{
    /**
     * @Route("/main2", name="main2")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'Main2Controller',
        ]);
    }
}
