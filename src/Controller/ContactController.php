<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
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
    public function index(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        return $this->renderForm('contact/index.html.twig', [
            'test' => $this->contactRepository->findAll(),
            'form'=> $form,
    ]);
    }

    /**
     * @Route("/contact/{id}", name="contactById")
     */

    public function contactById(int $id): Response
    {
        return $this->render('contact/index.html.twig', [
            'user' => $this->contactRepository->find($id),
        ]);
    }
}
