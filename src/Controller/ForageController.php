<?php

namespace App\Controller;

use App\Entity\Forage;
use App\Form\ForageType;
use App\Repository\ForageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/forage")
 */
class ForageController extends AbstractController
{
    /**
     * @Route("/", name="forage_index", methods="GET")
     */
    public function index(ForageRepository $forageRepository): Response
    {
        return $this->render('forage/index.html.twig', ['forages' => $forageRepository->findAll()]);
    }

    /**
     * @Route("/new", name="forage_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $forage = new Forage();
        $form = $this->createForm(ForageType::class, $forage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($forage);
            $em->flush();

            return $this->redirectToRoute('forage_index');
        }

        return $this->render('forage/new.html.twig', [
            'forage' => $forage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="forage_show", methods="GET")
     */
    public function show(Forage $forage): Response
    {
        return $this->render('forage/show.html.twig', ['forage' => $forage]);
    }

    /**
     * @Route("/{id}/edit", name="forage_edit", methods="GET|POST")
     */
    public function edit(Request $request, Forage $forage): Response
    {
        $form = $this->createForm(ForageType::class, $forage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('forage_edit', ['id' => $forage->getId()]);
        }

        return $this->render('forage/edit.html.twig', [
            'forage' => $forage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="forage_delete", methods="DELETE")
     */
    public function delete(Request $request, Forage $forage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$forage->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($forage);
            $em->flush();
        }

        return $this->redirectToRoute('forage_index');
    }
}
