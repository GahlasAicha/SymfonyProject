<?php

namespace App\Controller;

use cebe\markdown\Markdown;
use App\Entity\Atelier;
use App\Form\AtelierType;
use App\Repository\AtelierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/atelier')]
final class AtelierController extends AbstractController
{
    #[Route(name: 'app_atelier_index', methods: ['GET'])]
    public function index(AtelierRepository $atelierRepository): Response
    {
        return $this->render('atelier/index.html.twig', [
            'ateliers' => $atelierRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_atelier_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        // l'utilisateur est un instructeur
        $this->denyAccessUnlessGranted('ROLE_INSTRUCTEUR');

        $atelier = new Atelier();
        $form = $this->createForm(AtelierType::class, $atelier);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // Associer l'instructeur connecté à l'atelier
            $instructeur = $this->getUser(); // L'utilisateur connecté
            $atelier->setInstructeur($instructeur); // L'instructeur devient l'auteur de l'atelier


            $parser = new Markdown();
            $atelier->setDescriptionHtml($parser->parse($atelier->getDescription()));

            $entityManager->persist($atelier);
            $entityManager->flush();

            return $this->redirectToRoute('app_atelier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('atelier/new.html.twig', [
            'atelier' => $atelier,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_atelier_show', methods: ['GET'])]
    public function show(Atelier $atelier): Response
    {
        //convertir la description de markdown a html
        $parser = new Markdown();
        $atelierDescriptionHtml = $parser->parse($atelier->getDescription());
        if (!$atelier) {
            throw $this->createNotFoundException('Atelier non trouvé.');
        }
        return $this->render('atelier/show.html.twig', [

            'atelier' => $atelier,
            'atelierDescriptionHtml' => $atelierDescriptionHtml,

        ]);
    }

    #[Route('/{id}/edit', name: 'app_atelier_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Atelier $atelier, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AtelierType::class, $atelier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $parser = new Markdown();
            $atelier->setDescriptionHtml($parser->parse($atelier->getDescription()));

            $entityManager->flush();

            return $this->redirectToRoute('app_atelier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('atelier/edit.html.twig', [
            'atelier' => $atelier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_atelier_delete', methods: ['POST'])]
    public function delete(Request $request, Atelier $atelier, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$atelier->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($atelier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_atelier_index', [], Response::HTTP_SEE_OTHER);
    }
}
