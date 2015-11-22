<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Form\LessonType;
use AppBundle\Entity\Lesson;


/**
 * @Route("/admin")
 */
class LessonController extends Controller
{

    /**
     * @Route("/lecons", name="back_lesson_index")
     * @Template
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $lessons = $em->getRepository('AppBundle:Lesson')->findAll();

        return array('lessons' => $lessons);
    }


    /**
     * @Route("/lecons/ajouter", name="back_lesson_add")
     * @Template
     */
    public function addAction(Request $request)
    {

        $lesson = new Lesson();

    	$form = $this->createForm(new LessonType(), $lesson);

    	if($form->handlerequest($request)->isValid()){

    		$em = $this->getDoctrine()->getManager();
            $em->persist($lesson);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add('back', 'Utilisateur ajouté');

    		return $this->redirect($this->generateUrl('back_lesson_index'));
    	}

    	return array('form' => $form->createView());
    }


    /**
     * @Route("/lecons/modifier/{id}", name="back_lesson_edit")
     * @Template
     */
    public function editAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $lesson = $em->getRepository('AppBundle:Lesson')->findOneById($id);

        if (!$lesson) {
            throw new NotFoundHttpException("Cet utilisateur n'existe pas"); //Sécurité
        }

    	$form  = $this->createForm(new LessonType(), $lesson); // on génère le form

    	if($form->handlerequest($request)->isValid()){

            $em->persist($lesson);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add('back', 'Utilisateur modifié');


    		return $this->redirect($this->generateUrl('back_lesson_index'));
    	}

        return array('form' => $form->createView());
    }

    /**
    * @Route("/lecons/supprimer/{id}", name="back_lesson_delete")
    * @Template
    */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $lesson = $em->getRepository('AppBundle:Lesson')->find($id);

        if (!$lesson) {
            throw new NotFoundHttpException("Cet utilisateur n'existe pas"); //Sécurité
        }

        $em->remove($lesson);
        $em->flush();

        $session = $request->getSession();
        $session->getFlashBag()->add('back', 'Utilisateur supprimé');

        return $this->redirect($this->generateUrl('back_lesson_index'));
    }
}
