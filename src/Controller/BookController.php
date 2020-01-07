<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\UserBook;
use App\Entity\Author;
use App\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\BookRepository;
use App\Repository\AuthorRepository;
use App\Repository\UserBookRepository;
use Symfony\Component\Security\Core\User\UserInterface;



/**
 * @Route("/book", name="book.")
 */
class BookController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index(BookRepository $bookRepository)
    {
        
        $books = $bookRepository->findAll();
        dump($books);
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController', 'books' => $books
        ]);
    }

     /**
     *  @Route("/create", name="create")
     */
    public function create(Request $request, AuthorRepository $authorRepository)
    {
        

        $book = new Book();

        $form = $this->createForm(BookType::class, $book);
    
        $form->handleRequest($request);
        
        if ( $form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();
            return $this->redirect($this->generateUrl('book.index'));
        }
        return $this->render('book/create.html.twig', [
            'form' => $form->createView()
        ]);
        // return new Response('Post was created');


    }

    /**
     *  @Route("/update/{id}", name="update")
     */
    public function update(Request $request, Book $book)
    {
        //dump($request);
        $form = $this->createForm(BookType::class, $book);
        // $book->setName('Dani');
        $form->handleRequest($request);
        
        if ( $form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();
            return $this->redirect($this->generateUrl('book.index'));
        }
        return $this->render('book/create.html.twig', [
            'form' => $form->createView()
        ]);
        // return new Response('Post was created');


    }

     /**
     *  @Route("/show/{id}", name="show")
     */
    // public function show($id, BookRepository $bookRepository)
    public function show(Book $book)
    {
        
        return $this->render('book/show.html.twig', [
            'controller_name' => 'BookController', 'book' => $book
        ]);

    }


         /**
     *  @Route("/remove/{id}", name="remove")
     */
    // public function remove($id, BookRepository $bookRepository)
    public function remove(Book $book)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($book);
        $em->flush();
        $this->addFlash('success','Libro eliminado con éxito');
       
        return $this->redirect($this->generateUrl('book.index'));
       


    }

}
