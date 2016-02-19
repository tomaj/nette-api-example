<?php

namespace App\Api\v1\Handlers;

use App\Model\Repository\UserRepository;
use Tomaj\NetteApi\Handlers\BaseHandler;
use Tomaj\NetteApi\Params\InputParam;
use Tomaj\NetteApi\Response\JsonApiResponse;

class DetailUserHandler extends BaseHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function params()
    {
        return [
            new InputParam(InputParam::TYPE_GET, 'id', InputParam::REQUIRED),
        ];
    }

    public function handle($params)
    {
        $user = $this->userRepository->find($params['id']);
        if (!$user) {
            return new JsonApiResponse(404, ['status' => 'error', 'message' => 'User not found']);
        }
        return new JsonApiResponse(200, ['status' => 'ok', 'user' => $user->id]);
    }
}
