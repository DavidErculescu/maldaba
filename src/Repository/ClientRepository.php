<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ClientRepository extends EntityRepository
{
    public function findAll($client_status = 'all')
    {
        $query = $this->createQueryBuilder('client');

        if($client_status != 'all')
        {
            $query->join('client.status', 'status');
            $query->where(' status.code = :client_status ');
            $query->setParameter('client_status',$client_status);
        }

        $result = $query->getQuery();

        return $result->getResult();
    }
}