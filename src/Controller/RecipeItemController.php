<?php

namespace App\Controller;

use App\Entity\RecipeItem;
use App\Form\RecipeItem2Type;
use App\Repository\RecipeItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/recipe_item")
 */
class RecipeItemController extends AbstractController
{
    /**
     * @Route("/", name="recipe_item_index", methods={"GET"})
     */
    public function index(RecipeItemRepository $recipeItemRepository): Response
    {
        return $this->render('recipe_item/index.html.twig', ['recipe_items' => $recipeItemRepository->findAll()]);
    }

    /**
     * @Route("/new", name="recipe_item_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $recipeItem = new RecipeItem();
        $form = $this->createForm(RecipeItem2Type::class, $recipeItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recipeItem);
            $entityManager->flush();

            return $this->redirectToRoute('recipe_item_index');
        }

        return $this->render('recipe_item/new.html.twig', [
            'recipe_item' => $recipeItem,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="recipe_item_show", methods={"GET"})
     */
    public function show(RecipeItem $recipeItem): Response
    {
        return $this->render('recipe_item/show.html.twig', ['recipe_item' => $recipeItem]);
    }

    /**
     * @Route("/{id}/edit", name="recipe_item_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RecipeItem $recipeItem): Response
    {
        $form = $this->createForm(RecipeItem2Type::class, $recipeItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recipe_item_index', ['id' => $recipeItem->getId()]);
        }

        return $this->render('recipe_item/edit.html.twig', [
            'recipe_item' => $recipeItem,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="recipe_item_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RecipeItem $recipeItem): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recipeItem->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recipeItem);
            $entityManager->flush();
        }

        return $this->redirectToRoute('recipe_item_index');
    }
}
