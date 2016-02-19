<?php

namespace App\Api\v1\Handlers;

use App\Model\Repository\UserRepository;
use Tomaj\NetteApi\Handlers\BaseHandler;
use Tomaj\NetteApi\Params\InputParam;
use Tomaj\NetteApi\Response\JsonApiResponse;

class CreateUserHandler extends BaseHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function params()
    {
        return [
            new InputParam(InputParam::TYPE_POST, 'name', InputParam::REQUIRED),
            new InputParam(InputParam::TYPE_POST, 'position', InputParam::OPTIONAL),
        ];
    }

    public function handle($params)
    {
        $user = $this->userRepository->add($params['name'], $params['position']);
        return new JsonApiResponse(200, ['status' => 'ok', 'user' => $user->id]);
    }
}
