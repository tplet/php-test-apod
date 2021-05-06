<?php


namespace App\Controller;


use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleAuthController extends AbstractController
{
    protected ClientRegistry $clientRegistry;

    /**
     * GoogleAuthController constructor.
     * @param ClientRegistry $clientRegistry
     */
    public function __construct(ClientRegistry $clientRegistry)
    {
        $this->clientRegistry = $clientRegistry;
    }

    /**
     * Start connect process to google
     *
     * @return RedirectResponse
     */
    public function start(): RedirectResponse
    {
        return $this->getClientRegistry()
            ->getClient('google')
            ->redirect()
        ;
    }

    /**
     * After connect success, redirect to restricted homepage
     *
     * @return RedirectResponse
     */
    public function check(): RedirectResponse
    {
        return $this->redirectToRoute('restricted_home');
    }

    /**
     * @return ClientRegistry
     */
    public function getClientRegistry(): ClientRegistry
    {
        return $this->clientRegistry;
    }
}