<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contact = new Contact();
        $contact->setNom("FOURNIER");
        $contact->setPrenom("Florian");
        $contact->setEmail("florianfournier150@gmail.com");
        $contact->setMessage("Je suis le message de florian");
        $contact->setSujet("LE SUJET");

        $contact2 = new Contact();
        $contact2->setNom("ZOURGUI");
        $contact2->setPrenom("Monsif");
        $contact2->setEmail("florianfournier150@gmail.com");
        $contact2->setMessage("Je suis le message de florian");
        $contact2->setSujet("LE SUJET");

        $article = new Article();
        $article->setNom("La vie est la mort");
        $article->setContenu("La vie est la mort contenu");
        $article->setSlug("/articles/vie-mort");

        $manager->persist($contact);
        $manager->persist($article);
        $manager->persist($contact2);
        $manager->flush();
    }
}
