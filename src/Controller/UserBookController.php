<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Book;
use App\Entity\UserBook;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;
use App\Repository\UserBookRepository;
use Symfony\Component\Security\Core\User\UserInterface;


class UserBookController extends AbstractController
{
    /**
     * @Route("/user_books/", name="user_book.index")
     */
    public function index(BookRepository $bookRepository, UserBookRepository $userBookRepository, UserInterface $user)
    {
        $userId = null !== $user ? $user->getId() : null;
        dump($userId);
        $userbooks = $userBookRepository->findBy(array('user' => $user));
        dump($userbooks);
        $books = [];
        foreach($userbooks as $userbook){                   
            $book = $userbook->getBook();
            array_push($books, $book);
        }
        return $this->render('user_book/index.html.twig', [
            'controller_name' => 'BookController', 'books' => $books
        ]);
    }

    /**
     * @Route("/user_books/delete/{id}/", name="user_book.destroy")
     */
    public function destroy(Book $book, BookRepository $bookRepository, UserBookRepository $userBookRepository, UserInterface $user)
    {
        dump($book);
        $userId = null !== $user ? $user->getId() : null;
        dump($userId);

        $userbook = $userBookRepository->findBy(array('user' => $user, 'book' => $book));
        dump($userbook);

        $em = $this->getDoctrine()->getManager();
        $em->remove($userbook[0]);
        $em->flush();

     

        $this->addFlash('success','Libro retornado con éxito');
     
        return $this->redirect($this->generateUrl('user_book.index'));
  
    }


    /**
     * @Route("/user_books/reserve/{id}/", name="user_book.reserve")
     */
    public function reserve(Book $book, BookRepository $bookRepository, UserBookRepository $userBookRepository, UserInterface $user)
    {
        dump($book);
        $userId = null !== $user ? $user->getId() : null;
        dump($userId);
     
        //
        //Validar contador de libros
        //Condicional if (success) : (error)
        // Si es succes hago la reserva, disminuyo el contador de libro y guardo en base de datos del libro
        //$this->addFlash('success','Libro reservado con éxito');
        //
        $userbook = new UserBook();
        $userbook->setBook($book);
        $userbook->setUser($user);

        $em = $this->getDoctrine()->getManager();
        $em->persist($userbook);
        $em->flush();

        $this->addFlash('success','Libro reservado con éxito');


    
        return $this->redirect($this->generateUrl('book.index'));
      

    }
}
