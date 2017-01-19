<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserController extends Controller
{
    private $userRepository;

    /**
     * @var UserRepository
     */
    public function  __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }
    public function authenticated()
    {
        $id = Authorizer::getResourceOwnerId();
        return $this->userRepository->skipPresenter(false)->find($id);
    }
}

