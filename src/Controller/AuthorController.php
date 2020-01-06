<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AuthorRepository;

class AuthorController extends AbstractController
{
    /**
     * @Route("/authors/", name="author")
     */
    public function index(AuthorRepository $bookRepository)
    {
        
        $books = $bookRepository->findAll();
        dump($books);
        return $this->render('author/index.html.twig', [
            'controller_name' => 'BookController', 'books' => $books
        ]);
    }
}
