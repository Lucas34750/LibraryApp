<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Borrow;
use App\Repository\BorrowRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/borrow')]
final class BorrowController extends AbstractController
{
    #[Route(name: 'app_borrow_index')]
    public function index(BorrowRepository $borrowRepository): Response
    {
        return $this->render('borrow/index.html.twig', [
            'borrows' => $borrowRepository->findAll(),
        ]);
    }

    #[Route('/new/{id}', name: 'app_borrow')]
    public function new(EntityManagerInterface $entityManager, Book $book): Response
    {
        if($book->isBorrowed()){
            throw new NotFoundHttpException("ce livre est deja emprunté!");
        }
        $borrow=new Borrow;
        $borrow->setBook($book);
        $borrow->setPerson($this->getUser());
        $borrow->setBorrowDate(new DateTime());
        $borrow->setStatus('en cours');
        $entityManager->persist($borrow);
        $entityManager->flush();
     return $this->redirectToRoute('app_book_index');   
    }


    #[Route('/giveBack/{id}', name: 'app_borrow_giveBack')]
    public function giveBack(EntityManagerInterface $entityManager,Book $book){
        $borrow=$entityManager->getRepository(Borrow::class)->findOneBy(['status'=> "en cours","book"=>$book]);
        if(!$borrow){
            throw new NotFoundHttpException('vous ,n\'empruntez pas ce livre');
        }
        $borrow->setStatus('retourné');
        $entityManager->flush();
        return $this->redirectToRoute("app_book_index");
    }
}
