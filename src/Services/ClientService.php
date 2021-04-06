<?php

namespace App\Services;

use App\Entity\ClientEntity;
use App\Entity\StatusEntity;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ClientService
{
    private $container;
    private $em;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->em = $this->container->get('doctrine')->getManager();
    }

    public function listClients($client_status)
    {
        $result = [
            'clients'  => $this->em->getRepository(ClientEntity::class)->findAll($client_status),
            'statuses' => $this->em->getRepository(StatusEntity::class)->findAll()
        ];

        return $result;
    }

    public function setClientStatus($clientId, $status)
    {
        $client = $this->em->getRepository(ClientEntity::class)->findOneById($clientId);
        $status = $this->em->getRepository(StatusEntity::class)->findOneByCode($status);

        $client->setStatus($status);

        $this->em->persist($client);
        $this->em->flush();
    }

    public function createClient($data)
    {
        $clientEntity = new ClientEntity();

        $clientEntity->setTitle($data['title']);
        $clientEntity->setFirstName($data['first_name']);
        $clientEntity->setSurname($data['surname']);
        $clientEntity->setDateOfBirth(new \DateTime($data['date_of_birth']));
        $clientEntity->setEmail($data['email']);
        $clientEntity->setMobilePhone($data['mobile_phone']);
        $clientEntity->setAddress1($data['address_1']);
        $clientEntity->setAddress2($data['address_2']);
        $clientEntity->setPostcode($data['postcode']);
        $clientEntity->setCity($data['city']);
        $clientEntity->setCountry($data['country']);
        $clientEntity->setStatus($this->em->getRepository(StatusEntity::class)->findOneByCode('referred'));

        $this->em->persist($clientEntity);
        $this->em->flush();

        return ['id' => $clientEntity->getId()];
    }
}