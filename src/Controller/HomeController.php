<?php

namespace App\Controller;

use App\Repository\CodeRepository;
use App\Repository\LanguageRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $req, CodeRepository $codeRepo, LanguageRepository $langRepo, UserRepository $userRepo)
    {
        $items = [];
        if ($req->query->has('search')) {
            $search = $req->query->get('search');
            if (strpos($search, "#") === 0) {
                $lang = $langRepo->findOneBy(['fullname' => substr($search, 1)]);
                $items = $codeRepo->findBy(['language' => $lang]);
            } else if (strpos($search, "@") === 0) {
                $user = $userRepo->findOneBy(['nickname' => substr($search, 1)]);
                $items = $codeRepo->findBy(['author' => $user]);
            } else {
                $items = $codeRepo->search($search);
            }
        } else {
            $items = $codeRepo->findAll();
        }
        return $this->render('home/index.html.twig', [
            'items' => $items,
            'previous_search' => $search ?? ''
        ]);
    }
}
