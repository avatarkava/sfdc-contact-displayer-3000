<?php
namespace SfdcContactBundle\Auth;

use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUser;
use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUserProvider;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;

/**
 * Class OAuthProvider
 * @package SfdcContactBundle\Auth
 */
class OAuthProvider extends OAuthUserProvider
{
    protected $session, $admins;

    public function __construct($session, $service_container)
    {
        $this->session = $session;
        $this->container = $service_container;
    }

    /**
     * Takes the OAuth response from Salesforce and stores returned data
     * into the session for use later
     *
     * @param UserResponseInterface $response
     * @return OAuthUser|\Symfony\Component\Security\Core\User\UserInterface
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $this->session->set('access_token', $response->getAccessToken());
        $this->session->set('oauth_token', $response->getOAuthToken());
        $this->session->set('oauth_data', $response->getData());

        return new OAuthUser($response->getUsername());
    }
}