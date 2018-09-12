<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\ObjectManager;

use App\Entity\Client; 


class SenforageController extends AbstractController
{
    /**
     * @Route("/senforage", name="senforage")
     */
    public function index()
    {
        return $this->render('senforage/index.html.twig', [
            'controller_name' => 'SenforageController',
        ]);
    }
    /**
     * @Route("/",name="accueil")
     */
    public function accueil()
    {
        return $this->render('senforage/accueil.html.twig');
            
    }
    /**
     * @Route("/client",name="client")
     */
    public function client()
    {
        return $this->render('senforage/client.html.twig');
            
    }
    /**
     * @Route("/client/addclient",name="addclient")
     */
    public function addclient(Request $request)
    {
        $clients=new Client();
        $form = $this->createFormBuilder($clients)
            ->add('prenom')
            ->add('nom')
            ->add('adresse')
            ->add('telephone')
            ->getForm();





        return $this->render('senforage/client/index.html.twig',[
            'formAddClient' => $form->createView()
        ]);
            
    }
    /**
     * @Route("/client/deleteclient",name="deleteclient")
     */
    public function deleteclient()
    {
        return $this->render('senforage/deleteclient.html.twig');
            
    }

    /**
     * @Route("/client/updateclient",name="updateclient")
     */
    public function updateclient()
    {
        return $this->render('senforage/updateclient.html.twig');
            
    }
    /**
     * @Route("/client/editclient",name="editclient")
     */
    public function editclient()
    {
        return $this->render('senforage/editclient.html.twig');
            
    }




    /**
     * @Route("/abonnement",name="abonnement")
     */
    public function abonnement()
    {
        return $this->render('senforage/abonnement.html.twig');
            
    }
    /**
     * @Route("/compteur",name="compteur")
     */
    public function compteur()
    {
        return $this->render('senforage/compteur.html.twig');
            
    }
    /**
     * @Route("/consommation",name="consommation")
     */
    public function consommation()
    {
        return $this->render('senforage/consommation.html.twig');
            
    }
    /**
     * @Route("/facturation",name="facturation")
     */
    public function facturation()
    {
        return $this->render('senforage/facturation.html.twig');
            
    }
    /**
     * @Route("/reglement",name="reglement")
     */
    public function reglement()
    {
        return $this->render('senforage/reglement.html.twig');
            
    }
}
