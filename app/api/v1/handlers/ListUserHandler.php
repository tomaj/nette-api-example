<?php

namespace App\Api\v1\Handlers;

use App\Model\Repository\UserRepository;
use Tomaj\NetteApi\Handlers\BaseHandler;
use Tomaj\NetteApi\Params\InputParam;
use Tomaj\NetteApi\Response\JsonApiResponse;

class ListUserHandler extends BaseHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function params()
    {
        return [
            new InputParam(InputParam::TYPE_GET, 'page', InputParam::OPTIONAL),
        ];
    }

    public function handle($params)
    {
        $users = $this->userRepository->all()->fetchAll();
        return new JsonApiResponse(200, ['status' => 'ok', 'users' => $users]);
    }
}