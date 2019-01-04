<?php

namespace App\Controller;

use App\Entity\StreamCondition;
use App\Form\StreamConditionType;
use App\Repository\StreamConditionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/stream/condition")
 */
class StreamConditionController extends AbstractController
{
    /**
     * @Route("/", name="stream_condition_index", methods={"GET"})
     */
    public function index(StreamConditionRepository $streamConditionRepository): Response
    {
        return $this->render('stream_condition/index.html.twig', ['stream_conditions' => $streamConditionRepository->findAll()]);
    }

    /**
     * @Route("/new", name="stream_condition_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $streamCondition = new StreamCondition();
        $form = $this->createForm(StreamConditionType::class, $streamCondition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($streamCondition);
            $entityManager->flush();

            return $this->redirectToRoute('stream_condition_index');
        }

        return $this->render('stream_condition/new.html.twig', [
            'stream_condition' => $streamCondition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stream_condition_show", methods={"GET"})
     */
    public function show(StreamCondition $streamCondition): Response
    {
        return $this->render('stream_condition/show.html.twig', ['stream_condition' => $streamCondition]);
    }

    /**
     * @Route("/{id}/edit", name="stream_condition_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StreamCondition $streamCondition): Response
    {
        $form = $this->createForm(StreamConditionType::class, $streamCondition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stream_condition_index', ['id' => $streamCondition->getId()]);
        }

        return $this->render('stream_condition/edit.html.twig', [
            'stream_condition' => $streamCondition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stream_condition_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StreamCondition $streamCondition): Response
    {
        if ($this->isCsrfTokenValid('delete'.$streamCondition->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($streamCondition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('stream_condition_index');
    }
}
