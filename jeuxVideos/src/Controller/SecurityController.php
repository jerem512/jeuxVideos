<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Form\EditType;

class SecurityController extends AbstractController
{
    /**
     * @Route("/registration", name="register")
     */ 

    public function create(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder){

    		$user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user->setRole(0);
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute("home");
        }

        return $this-> render("security/createAccount.html.twig", [
            "formNew" => $form->createView(),
            'user' => $user,
        ]);
    }

      /**
     * @Route("/login", name="s_login")
     */
    public function login()
    {
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/logout", name="s_logout")
     */

    public function logout(){}

     /**
     *      *@Route("/edit/{id}", name="edit")
     */
    public function edit(Request $request, User $user): Response
    {
        $editform = $this->createForm(EditType::class, $user);
        $editform->handleRequest($request);

        if ($editform->isSubmitted() && $editform->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('security/edit.html.twig', [
            'user' => $user,
            'editform' => $editform->createView(),
        ]);
    }

    /**
     *@Route("/delete/{id}", name="delete", methods="DELETE")
     * @param User $user
     *@param Request $request
     *@return \Symfony\Component\HttpFoundation\RedirectResponse;

     */

    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }
}
