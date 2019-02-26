<?php

namespace App\Controller;

use App\Entity\Fish;
use App\Form\FishType;
use App\Repository\FishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fish")
 */
class FishController extends AbstractController
{
    /**
     * @Route("/", name="fish_index", methods={"GET"})
     */
    public function index(FishRepository $fishRepository): Response
    {
        return $this->render('fish/index.html.twig', [
            'fish' => $fishRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fish_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fish = new Fish();
        $form = $this->createForm(FishType::class, $fish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fish);
            $entityManager->flush();

            return $this->redirectToRoute('fish_index');
        }

        return $this->render('fish/new.html.twig', [
            'fish' => $fish,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fish_show", methods={"GET"})
     */
    public function show(Fish $fish): Response
    {
        return $this->render('fish/show.html.twig', [
            'fish' => $fish,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fish_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fish $fish): Response
    {
        $form = $this->createForm(FishType::class, $fish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fish_index', [
                'id' => $fish->getId(),
            ]);
        }

        return $this->render('fish/edit.html.twig', [
            'fish' => $fish,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fish_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fish $fish): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fish->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fish);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fish_index');
    }
}
