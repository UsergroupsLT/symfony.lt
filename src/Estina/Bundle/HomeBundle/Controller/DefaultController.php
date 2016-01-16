<?php

namespace Estina\Bundle\HomeBundle\Controller;

use Estina\Bundle\HomeBundle\Form\ParticipantType;
use Estina\Bundle\HomeBundle\Event\ParticipantEvent;
use Estina\Bundle\HomeBundle\ParticipantEvents;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * DefaultController 
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @method({"GET"})
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * Register user 
     * 
     * @param Request $request 
     *
     * @Route("/register", name="register")
     * @method({"POST"})
     * @Template()
     */
    public function registerAction()
    {
        $form = $this->createForm(new ParticipantType, null, [
            'action' => $this->generateUrl('register')
        ]);

        $request = $this->get('request');

        if ('POST' === $request->getMethod()) {
            $form->bind($request);

            if ($form->isValid()) {
                $participant = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($participant);
                $em->flush();

                $event = new ParticipantEvent($participant);
                $this->get('event_dispatcher')
                    ->dispatch(ParticipantEvents::CREATE, $event);
            }

            return new JsonResponse(['success' => true]);
        }

        return [
            'form' => $form->createView()
        ];
    }


    /**
     * Partners block 
     * 
     * @Template()
     */
    public function partnersAction()
    {
        return [];
    }

    /**
     * Speakers block
     * 
     * @Template()
     */
    public function speakersAction()
    {
        return [];
    }

    /**
     * FAQ block 
     * 
     * @Template()
     */
    public function faqAction()
    {
        return [];
    }
}
