<?php

namespace App\Controller;

use App\Form\KundeType;
use App\Repository\AuftragRepository;
use App\Repository\HochregallagerRepository;
use App\Repository\MateriallagerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
class Dashboard extends AbstractController
{
    public function __construct(
        private readonly MateriallagerRepository $mr,
        private readonly HochregallagerRepository $hr,
        private readonly MateriallagerRepository $mt,
        private readonly AuftragRepository $ar,
    ) {

    }
    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(): Response
    {
        return $this->render('dashboard/dashboard.html.twig');
    }

    #[Route('/dashboard/kunde', name: 'kunde')]
    public function dashboardKunde(Request $request): Response
    {
        $form = $this->createForm(KundeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

        }
        return $this->render('kunde/kunde.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/dashboard/kunde/form', name: 'dashboardKundeForm', methods: ['POST'])]
    public function dashboardKundeForm(Request $request): Response
    {
        $form = $request->request->get('form_id');
        $material1 = $request->request->get('material_1');
        $material2 = $request->request->get('material_2');
        $material3 = $request->request->get('material_3');

        return new Response($form . $material1 . $material2 . $material3);
    }

    #[Route('/dashboard/mitarbeiter', name: 'mitarbeiter', methods: ['GET'])]
    public function dashboardMitarbeiter(Request $request): Response
    {
        return $this->render('mitarbeiter/mitarbeiter.html.twig');
    }
}