<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/book')]
final class BookController extends AbstractController
{
    #[Route('/search/{id}',name: 'app_book_index', methods: ['GET'],defaults: ['id'=>null])]
    public function index(BookRepository $bookRepository, ?Author $author, ?int $id,Request $req): Response
    {
        $searchQuery = $req->query->get('query',"");
        if($id!==null){
            if($author){
                $books = $bookRepository->createQueryBuilder('b')
                ->where('b.title LIKE :searchQuery AND b.author=:author')
                ->setParameter('searchQuery', '%' . $searchQuery . '%')
                ->setParameter('author', $author )
                ->getQuery()
                ->getResult();            }
           else{
            throw new NotFoundHttpException('l\'auteur n\'existe pas');
           }
        }
        else{
            $books = $bookRepository->createQueryBuilder('b')
        ->where('b.title LIKE :searchQuery')
        ->setParameter('searchQuery', '%' . $searchQuery . '%')
        ->getQuery()
        ->getResult();
        }
        
        return $this->render('book/index.html.twig', [
            'books' => $books,
            'author'=>$author
        ]);
    }

    #[Route('/new', name: 'app_book_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute('app_book_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('book/new.html.twig', [
            'book' => $book,
            'form' => $form,
        ]);
    }

    #[Route('/detail/{id}', name: 'app_book_show', methods: ['GET'])]
    public function show(Book $book): Response
    {
        return $this->render('book/show.html.twig', [
            'book' => $book,
            'isBorrowed'=>$book->isBorrowed(),
            'isMine'=>$book->isMine($this->getUser()),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_book_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Book $book, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_book_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('book/edit.html.twig', [
            'book' => $book,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_book_delete', methods: ['POST'])]
    public function delete(Request $request, Book $book, EntityManagerInterface $entityManager): Response
    {
        foreach($book->getBorrows() as $borrow){
            $entityManager->remove($borrow);
        }
        if ($this->isCsrfTokenValid('delete'.$book->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($book);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_book_index', [], Response::HTTP_SEE_OTHER);
    }
}
