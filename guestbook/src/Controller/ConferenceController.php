<?php

namespace App\Controller;
use App\Entity\Conference;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ConferenceRepository;
use Twig\Environment;

class ConferenceController extends AbstractController
{
    #[Route('/conference/{id}', name: 'conference')]
    public function show(Environment $twig, Conference $conference, CommentRepository $commentRepository): Response
    {
        return new Response($twig->render('conference/show.html.twig', [
            'conference' => $conference,
            'comments' => $commentRepository->findBy(['conference' => $conference], ['createdAt' => 'DESC']),
        ]));
    }
}
