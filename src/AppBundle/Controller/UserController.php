<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;


/**
 * @Route("/admin")
 */
class UserController extends Controller
{

    /**
     * @Route("/utilisateurs", name="back_user_index")
     * @Template
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAll();

        return array('users' => $users);
    }


    /**
     * @Route("/utilisateurs/ajouter", name="back_user_add")
     * @Template
     */
    public function addAction(Request $request)
    {

        // 1) build the form
        $user = new User();
        $form = $this->createForm(new UserType(), $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like send them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('back_user_index');
        }

        return array('form' => $form->createView());
    }


    /**
    * @Route("/utilisateurs/supprimer/{id}", name="back_user_delete")
    * @Template
    */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        if (!$user) {
            throw new NotFoundHttpException("Cet utilisateur n'existe pas"); //Sécurité
        }

        $em->remove($user);
        $em->flush();

        $session = $request->getSession();
        $session->getFlashBag()->add('back', 'Utilisateur supprimé');

        return $this->redirect($this->generateUrl('back_user_index'));
    }
}
