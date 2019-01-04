<?php

namespace App\Controller;

use App\Entity\WaterTemperatureCondition;
use App\Form\WaterTemperatureConditionType;
use App\Repository\WaterTemperatureConditionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/water/temperature/condition")
 */
class WaterTemperatureConditionController extends AbstractController
{
    /**
     * @Route("/", name="water_temperature_condition_index", methods={"GET"})
     */
    public function index(WaterTemperatureConditionRepository $waterTemperatureConditionRepository): Response
    {
        return $this->render('water_temperature_condition/index.html.twig', ['water_temperature_conditions' => $waterTemperatureConditionRepository->findAll()]);
    }

    /**
     * @Route("/new", name="water_temperature_condition_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $waterTemperatureCondition = new WaterTemperatureCondition();
        $form = $this->createForm(WaterTemperatureConditionType::class, $waterTemperatureCondition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($waterTemperatureCondition);
            $entityManager->flush();

            return $this->redirectToRoute('water_temperature_condition_index');
        }

        return $this->render('water_temperature_condition/new.html.twig', [
            'water_temperature_condition' => $waterTemperatureCondition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="water_temperature_condition_show", methods={"GET"})
     */
    public function show(WaterTemperatureCondition $waterTemperatureCondition): Response
    {
        return $this->render('water_temperature_condition/show.html.twig', ['water_temperature_condition' => $waterTemperatureCondition]);
    }

    /**
     * @Route("/{id}/edit", name="water_temperature_condition_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, WaterTemperatureCondition $waterTemperatureCondition): Response
    {
        $form = $this->createForm(WaterTemperatureConditionType::class, $waterTemperatureCondition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('water_temperature_condition_index', ['id' => $waterTemperatureCondition->getId()]);
        }

        return $this->render('water_temperature_condition/edit.html.twig', [
            'water_temperature_condition' => $waterTemperatureCondition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="water_temperature_condition_delete", methods={"DELETE"})
     */
    public function delete(Request $request, WaterTemperatureCondition $waterTemperatureCondition): Response
    {
        if ($this->isCsrfTokenValid('delete'.$waterTemperatureCondition->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($waterTemperatureCondition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('water_temperature_condition_index');
    }
}
