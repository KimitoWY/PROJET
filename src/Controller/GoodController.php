<?php

namespace App\Controller;

use App\Entity\Good;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/good', name: 'good')]
class GoodController extends AbstractController
{

    #[Route('/list', name: '_list')]
    public function listAction(EntityManagerInterface $em): Response
    {
        $productRepo = $em->getRepository(Good::class);
        $goods = $productRepo->findAll();

        return $this->render('Good/list.html.twig', ['goods' => $goods]);
    }
}
