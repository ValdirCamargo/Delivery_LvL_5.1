<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Services\OrderService;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class ClientCheckoutController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderService
     */
    private $orderService;
    private $with = ['client','cupom','items'];

    public function __construct
    (
        OrderRepository $repository,
        UserRepository $userRepository,
        OrderService $orderService
    )
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->orderService = $orderService;
    }

    public  function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;
        $orders = $this->repository
            ->skipPresenter(false)
            ->with($this->with)
            ->scopeQuery(function ($query)use($clientId){
            return $query
            ->where('client_id','=',$clientId);

        })->paginate();

        return $orders;
    }

    public  function store (CheckoutRequest $request)
    {
        $id = Authorizer::getResourceOwnerId();
        $data = $request->all();
        $clientId = $this->userRepository->find($id)->client->id;
        $data['client_id'] = $clientId;
        $o = $this->orderService->create($data);
        return $this->repository
            ->skipPresenter(false)
            ->with($this->with)
            ->find($o->id);
    }

    public function show($id)
    {

        return $this->repository
            ->skipPresenter(false)
            ->with($this->with)
            ->find($id);
    }


}
