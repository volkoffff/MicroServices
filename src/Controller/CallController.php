<?php


namespace App\Controller;

use App\Service\GotenbergService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CallController extends AbstractController
{

    #[Route('/gotenberg/convert', name: 'app_gotenberg_convert', methods: ['POST', 'GET'])]
    public function convert(Request $request, GotenbergService $gotenbergService): Response
    {

        $url = $request->request->get('url');
        $pdfContent = $gotenbergService->generatePdfFromUrl($url);

        // Créer une réponse avec le contenu PDF
        return new Response($pdfContent);
    }
}