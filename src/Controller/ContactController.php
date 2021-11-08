<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', []);
    }
    /**
     * @Route("/contact", name="contactWithoutNothing")
     */
    public function contactWithoutParameter(Request $request): Response
    {
        $name = $request->query->get('name');
        return $this->render('contact/index.html.twig', [
            'name'=>$name
        ]);
    }
    /**
     * @Route("/contact/{contactCity}", name="contact")
     */
    public function contact(Request $request, string $contactCity): Response
    {
        $name = $request->query->get('name');
        return $this->render('contact/index.html.twig', [
            'contactCity' => $contactCity,
            'name'=>$name
        ]);
    }
}
