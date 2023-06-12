<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    // redirection de page
    #[Route('/monProfil', name: 'app_monProfil')]
    public function profil(Request              $request, EntityManagerInterface $entityManager,
                           EntrepriseRepository $entrepriseRepository): Response
    {
        $newEntreprise = new Entreprise();

        $newEntrepriseForm = $this->createForm(EntrepriseType::class, $newEntreprise);
        $newEntrepriseForm->handleRequest($request);

        if ($newEntrepriseForm->isSubmitted() && $newEntrepriseForm->isValid()) {
            $entityManager->persist($newEntreprise);
            $entityManager->flush();

            return $this->redirectToRoute('app_monProfil');
        }
        return $this->render('monProfil/monProfil.html.twig', [
            'newEntreprise' => $newEntrepriseForm->createView()
        ]);
    }

    // redirection de page
    #[Route('/mesExperiences', name: 'app_mesExperiences')]
    public function mes_Experiences(Request $request): Response
    {
        return $this->render('monProfil/mesExperiences.html.twig');
    }

    // redirection de page
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request): Response
    {
        return $this->render('monProfil/contact.html.twig');
    }


}
