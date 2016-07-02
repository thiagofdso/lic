<?php

/**
 * Created by PhpStorm.
 * User: Thiago
 * Date: 02/07/2016
 * Time: 15:46
 */
namespace CodeDelivery\Services;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;
class ClientService
{
    private $clientRepository;
    private $userRepository;

    /**
     * ClientService constructor.
     * @param $clientRepository
     */
    public function __construct(ClientRepository $clientRepository,UserRepository $userRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function update(array $data,$id){
        $this->clientRepository->update($data,$id);
        $userId=$this->clientRepository->find($id)->user_id;
        $this->userRepository->update($data['user'],$userId);
    }
}