<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
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
        if ($this->getUser()) {
            $this->addFlash('info', "Vous êtes déjà connecté !");
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        if ($error){
            $this->addFlash('info', "Vous vous êtes trompé dans le login ou le mot de passe");
        }

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: '_logout')]
    public function logoutAction(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/create', name: '_create')]
    public function createAction(EntityManagerInterface $em, Request $request, UserPasswordHasherInterface $ph)
    {
        if ($this->getUser() != null) {
            $this->addFlash('info', 'Vous êtes déjà connecté ! Inutile de créer un compte');
            return $this->redirectToRoute('accueil_index');
        }

        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $user->getPassword();

            $user->setPassword($ph->hashPassword($user, $password));

            $em->persist($user);
            $em->flush();
            $this->addFlash('info', 'Votre inscription est confirmée');

            return $this->redirectToRoute('accueil_index');
        }

        else{
            if ($form->isSubmitted()) {
                $this->addFlash('info', 'Erreur lors de votre inscription');
                return $this->redirectToRoute('security_create');
            }
        }

        return $this->render('security/create.html.twig', ['formCreate' => $form]);
    }
}
