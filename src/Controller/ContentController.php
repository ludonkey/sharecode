<?php

namespace App\Controller;

use DateTime;
use App\Entity\Code;
use App\Form\CodeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContentController extends AbstractController
{
    /**
     * @Route("/new", name="new")
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $code = new Code();
        $form = $this->createForm(CodeType::class, $code);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $code->setAuthor($this->getUser());
            $code->setCreationDate(new DateTime());
            $manager->persist($code);
            $manager->flush();
            return $this->redirectToRoute("home");
        } else {
            return $this->render('content/new.html.twig', [
                'itemForm' => $form->createView()
            ]);
        }
    }
}
