<?php

namespace App\Controller;

use App\Entity\Facturation;
use App\Form\FacturationType;
use App\Repository\FacturationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/facturation")
 */
class FacturationController extends AbstractController
{
    /**
     * @Route("/", name="facturation_index", methods="GET")
     */
    public function index(FacturationRepository $facturationRepository): Response
    {
        return $this->render('facturation/index.html.twig', ['facturations' => $facturationRepository->findAll()]);
    }

    /**
     * @Route("/new", name="facturation_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $facturation = new Facturation();
        $form = $this->createForm(FacturationType::class, $facturation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($facturation);
            $em->flush();

            return $this->redirectToRoute('facturation_index');
        }

        return $this->render('facturation/new.html.twig', [
            'facturation' => $facturation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="facturation_show", methods="GET")
     */
    public function show(Facturation $facturation): Response
    {
        return $this->render('facturation/show.html.twig', ['facturation' => $facturation]);
    }

    /**
     * @Route("/{id}/edit", name="facturation_edit", methods="GET|POST")
     */
    public function edit(Request $request, Facturation $facturation): Response
    {
        $form = $this->createForm(FacturationType::class, $facturation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('facturation_edit', ['id' => $facturation->getId()]);
        }

        return $this->render('facturation/edit.html.twig', [
            'facturation' => $facturation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="facturation_delete", methods="DELETE")
     */
    public function delete(Request $request, Facturation $facturation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facturation->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($facturation);
            $em->flush();
        }

        return $this->redirectToRoute('facturation_index');
    }
}
