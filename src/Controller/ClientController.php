<?php

namespace App\Controller;

use App\Services\ClientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends AbstractController
{
    /**
     * @Route("/client/new", name="new_client")
     */
    public function newClientAction(ClientService $clientService)
    {
        return $this->render('new_client.html.twig');
    }

    /**
     * @Route("/client/new/create", name="new_client_create")
     */
    public function createNewClientAction(Request $request,ClientService $clientService)
    {
        $data = [
            'title'         => $request->get('InputTitle'),
            'first_name'    => $request->get('InputFirstName'),
            'surname'       => $request->get('InputSurname'),
            'date_of_birth' => $request->get('InputDateOfBirth'),
            'email'         => $request->get('InputEmail'),
            'mobile_phone'  => $request->get('InputMobilePhone'),
            'postcode'      => $request->get('InputPostcode'),
            'address_1'     => $request->get('InputAddress1'),
            'address_2'     => $request->get('InputAddress2'),
            'city'          => $request->get('InputCity'),
            'country'       => $request->get('InputCountry'),
        ];

        $result = $clientService->createClient($data);

        return $this->redirectToRoute('list_client', ['client_status' => 'referred']);
    }

    /**
     * @Route("/client/{client_status}", name="list_client")
     */
    public function listClientAction($client_status, ClientService $clientService)
    {
        $result = $clientService->listClients($client_status);

        $result['selected_type'] = $client_status;

        return $this->render('client.html.twig', $result);
    }

    /**
     * @Route("/client/{client_id}/{client_status}", name="set_client_status")
     */
    public function setClientStatusAction($client_id, $client_status, ClientService $clientService)
    {
        $clientService->setClientStatus($client_id, $client_status);

        return $this->redirectToRoute('list_client', ['client_status' => $client_status]);
    }
}