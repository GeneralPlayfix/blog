<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class ContactController extends AbstractController
{
    private $contactRepository;

    public function __construct(ContactRepository  $contactRepository){
        $this->contactRepository = $contactRepository;
    }
    /**
     * @Route("/contact", name="contactWithoutNothing")
     */
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'test' => $this->contactRepository->findAll(),
    ]);
    }

    /**
     * @Route("/contact/{id}", name="contactById")
     */
    public function contactById(string $id): Response
    {
        return $this->render('contact/index.html.twig', [
            'user' => $this->contactRepository->find($id),
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
