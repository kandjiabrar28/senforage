<?php

namespace App\Controller;

use App\Entity\Consommation;
use App\Form\ConsommationType;
use App\Repository\ConsommationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/consommation")
 */
class ConsommationController extends AbstractController
{
    /**
     * @Route("/", name="consommation_index", methods="GET")
     */
    public function index(ConsommationRepository $consommationRepository): Response
    {
        return $this->render('consommation/index.html.twig', ['consommations' => $consommationRepository->findAll()]);
    }

    /**
     * @Route("/new", name="consommation_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $consommation = new Consommation();
        $form = $this->createForm(ConsommationType::class, $consommation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($consommation);
            $em->flush();

            return $this->redirectToRoute('consommation_index');
        }

        return $this->render('consommation/new.html.twig', [
            'consommation' => $consommation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consommation_show", methods="GET")
     */
    public function show(Consommation $consommation): Response
    {
        return $this->render('consommation/show.html.twig', ['consommation' => $consommation]);
    }

    /**
     * @Route("/{id}/edit", name="consommation_edit", methods="GET|POST")
     */
    public function edit(Request $request, Consommation $consommation): Response
    {
        $form = $this->createForm(ConsommationType::class, $consommation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('consommation_edit', ['id' => $consommation->getId()]);
        }

        return $this->render('consommation/edit.html.twig', [
            'consommation' => $consommation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consommation_delete", methods="DELETE")
     */
    public function delete(Request $request, Consommation $consommation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$consommation->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($consommation);
            $em->flush();
        }

        return $this->redirectToRoute('consommation_index');
    }
}
