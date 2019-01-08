<?php

namespace App\Controller;

use App\Entity\TypeOfIngredient;
use App\Form\TypeOfIngredientType;
use App\Repository\TypeOfIngredientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/of/ingredient")
 */
class TypeOfIngredientController extends AbstractController
{
    /**
     * @Route("/", name="type_of_ingredient_index", methods={"GET"})
     */
    public function index(TypeOfIngredientRepository $typeOfIngredientRepository): Response
    {
        return $this->render('type_of_ingredient/index.html.twig', ['type_of_ingredients' => $typeOfIngredientRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_of_ingredient_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeOfIngredient = new TypeOfIngredient();
        $form = $this->createForm(TypeOfIngredientType::class, $typeOfIngredient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeOfIngredient);
            $entityManager->flush();

            return $this->redirectToRoute('type_of_ingredient_index');
        }

        return $this->render('type_of_ingredient/new.html.twig', [
            'type_of_ingredient' => $typeOfIngredient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_of_ingredient_show", methods={"GET"})
     */
    public function show(TypeOfIngredient $typeOfIngredient): Response
    {
        return $this->render('type_of_ingredient/show.html.twig', ['type_of_ingredient' => $typeOfIngredient]);
    }

    /**
     * @Route("/{id}/edit", name="type_of_ingredient_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeOfIngredient $typeOfIngredient): Response
    {
        $form = $this->createForm(TypeOfIngredientType::class, $typeOfIngredient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_of_ingredient_index', ['id' => $typeOfIngredient->getId()]);
        }

        return $this->render('type_of_ingredient/edit.html.twig', [
            'type_of_ingredient' => $typeOfIngredient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_of_ingredient_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeOfIngredient $typeOfIngredient): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeOfIngredient->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeOfIngredient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_of_ingredient_index');
    }
}
