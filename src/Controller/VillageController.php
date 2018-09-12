<?php

namespace App\Controller;

use App\Entity\Village;
use App\Form\VillageType;
use App\Repository\VillageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/village")
 */
class VillageController extends AbstractController
{
    /**
     * @Route("/", name="village_index", methods="GET")
     */
    public function index(VillageRepository $villageRepository): Response
    {
        return $this->render('village/index.html.twig', ['villages' => $villageRepository->findAll()]);
    }

    /**
     * @Route("/new", name="village_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $village = new Village();
        $form = $this->createForm(VillageType::class, $village);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($village);
            $em->flush();

            return $this->redirectToRoute('village_index');
        }

        return $this->render('village/new.html.twig', [
            'village' => $village,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="village_show", methods="GET")
     */
    public function show(Village $village): Response
    {
        return $this->render('village/show.html.twig', ['village' => $village]);
    }

    /**
     * @Route("/{id}/edit", name="village_edit", methods="GET|POST")
     */
    public function edit(Request $request, Village $village): Response
    {
        $form = $this->createForm(VillageType::class, $village);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('village_edit', ['id' => $village->getId()]);
        }

        return $this->render('village/edit.html.twig', [
            'village' => $village,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="village_delete", methods="DELETE")
     */
    public function delete(Request $request, Village $village): Response
    {
        if ($this->isCsrfTokenValid('delete'.$village->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($village);
            $em->flush();
        }

        return $this->redirectToRoute('village_index');
    }
}
