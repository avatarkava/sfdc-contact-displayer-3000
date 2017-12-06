<?php

namespace Tests\SfdcContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
/**
 * A very basic group of tests to verify if the user is logged in or not.
 *
 * Class DefaultControllerTest
 * @package Tests\SfdcContactBundle\Controller
 */
class DefaultControllerTest extends WebTestCase
{
    public function testIndexLoggedOut()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Please Log In', $crawler->filter('.container h2')->text());
    }

    public function testIndexLoggedInViaOAuth()
    {
        $client = static::createClient();
        $session = $client->getContainer()->get('session');
        $session->start();
        $session->set('access_token', 'testaccesstoken');
        $session->set('oauth_token', 'testoauthtoken');
        $session->set('oauth_data', array(
            'display_name' => 'Test User'
        ));

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome Back', $crawler->filter('.container h2')->text());
    }
}
