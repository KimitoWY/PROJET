<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route(path: '/security', name: 'security')]
class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: '_login')]
    public function loginAction(AuthenticationUtils $authenticationUtils): Response
    {
//        if ($this->getUser()) {
//            $this->addFlash('Warning', "Vous êtes déjà connecté !");
//        }

        $error = $authenticationUtils->getLastAuthenticationError();
//        if ($error){
//            $this->addFlash('Error', "Vous vous êtes trompé dans le login ou le mot de passe");
//        }

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: '_logout')]
    public function logoutAction(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
