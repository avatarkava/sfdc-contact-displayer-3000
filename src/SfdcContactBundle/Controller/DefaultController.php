<?php

namespace SfdcContactBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\NoConfigurationException;

class DefaultController extends Controller
{
    /**
     * Uses the configured authentication scheme (for this demo will be OAuth2)
     * to connect to a Salesforce instance and pull a full list of Contact.Id and Contact.FullName
     * from SOQL and return results for display as options in an HTML select field.
     *
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $session = $this->get('session');

        return $this->render('contacts/index.html.twig', array(
            'access_token' => $session->get('access_token'),
            'oauth' => $session->get('oauth_data'),
            'salesforce_instance' => $this->getParameter('salesforce_instance'),
            'salesforce_contact_soql' => $this->getParameter('salesforce_contact_soql'),
        ));
    }
}
