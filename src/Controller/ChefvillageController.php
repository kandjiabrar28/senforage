<?php

namespace App\Controller;

use App\Entity\Chefvillage;
use App\Form\ChefvillageType;
use App\Repository\ChefvillageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chefvillage")
 */
class ChefvillageController extends AbstractController
{
    /**
     * @Route("/", name="chefvillage_index", methods="GET")
     */
    public function index(ChefvillageRepository $chefvillageRepository): Response
    {
        return $this->render('chefvillage/index.html.twig', ['chefvillages' => $chefvillageRepository->findAll()]);
    }

    /**
     * @Route("/new", name="chefvillage_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $chefvillage = new Chefvillage();
        $form = $this->createForm(ChefvillageType::class, $chefvillage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chefvillage);
            $em->flush();

            return $this->redirectToRoute('chefvillage_index');
        }

        return $this->render('chefvillage/new.html.twig', [
            'chefvillage' => $chefvillage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chefvillage_show", methods="GET")
     */
    public function show(Chefvillage $chefvillage): Response
    {
        return $this->render('chefvillage/show.html.twig', ['chefvillage' => $chefvillage]);
    }

    /**
     * @Route("/{id}/edit", name="chefvillage_edit", methods="GET|POST")
     */
    public function edit(Request $request, Chefvillage $chefvillage): Response
    {
        $form = $this->createForm(ChefvillageType::class, $chefvillage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chefvillage_edit', ['id' => $chefvillage->getId()]);
        }

        return $this->render('chefvillage/edit.html.twig', [
            'chefvillage' => $chefvillage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chefvillage_delete", methods="DELETE")
     */
    public function delete(Request $request, Chefvillage $chefvillage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chefvillage->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chefvillage);
            $em->flush();
        }

        return $this->redirectToRoute('chefvillage_index');
    }
}
