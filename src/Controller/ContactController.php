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
        $form-> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();
            dump('Posté en base');
        }
        return $this->renderForm('contact/index.html.twig', [
            'test' => $this->contactRepository->findAll(),
            'form'=> $form,
    ]);
    }

    /**
     * @Route("/contact/mesDemandes", name="contactRequest")
     */

    public function contactRequest(): Response
    {
        return $this->render('contact/index.html.twig', [
            'request' => $this->contactRepository->findAll(),
        ]);
    }

    /**
     * @Route("/contact/mesDemandes/{id}", name="contactRequestId")
     */

    public function contactRequestId(int $id): Response
    {
        return $this->render('contact/index.html.twig', [
            'requestId' => $this->contactRepository->find($id),
        ]);
    }
}
