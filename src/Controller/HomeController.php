<?php

namespace App\Controller;

use App\Entity\Borrow;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/dashboard', name: 'app_home')]
    public function dashboard(EntityManagerInterface $entityManager): Response
    {
        $borrows=$entityManager->getRepository(Borrow::class)->findByPerson($this->getUser());
        return $this->render('home/index.html.twig', [
            'borrows'=>$borrows
        ]);
    }
    #[Route('/', name: 'app')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_home');
    }

}
