<?php

namespace App\Service;

use App\Entity\VirtualServerInfo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpClient\HttpClient;

class RequestToApiService
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function request(Array $data)
    {
        $client = HttpClient::create();
        $response = $client->request('POST', 'https://net-speak.pl/api_client/', [
            'body' => array_merge(['api_key' => '5b7ba15546f635aff426738c4820a899111950e1'], $data)
        ]);
        return $response;
    }

    public function getServerInfo()
    {
        $response = $this->request(['command' => 'server_info']);
        if ($response->getStatusCode() == 200) {
            $json = json_decode($response->getContent());
            $data = $json->{'response'};
            if ($data->{'result'} != 'success') {
                return false;
            }
        } else {
            return false;
        }
        return $data;
    }

    public function getAdminStatus()
    {
        $response = $this->request(['command' => 'clientlist']);
        if ($response->getStatusCode() == 200) {
            $json = json_decode($response->getContent());
            $data = $json->{'response'};
            if ($data->{'result'} != 'success') {
                return false;
            }
        } else {
            return false;
        }
        return $data;
    }
}