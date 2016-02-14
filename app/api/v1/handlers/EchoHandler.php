<?php

namespace App\Api\v1\Handlers;

use Tomaj\NetteApi\Handlers\BaseHandler;
use Tomaj\NetteApi\Params\InputParam;
use Tomaj\NetteApi\Response\JsonApiResponse;

class EchoHandler extends BaseHandler
{
	public function params()
	{
		return [
            new InputParam(InputParam::TYPE_GET, 'echo', InputParam::REQUIRED),
        ];
	}

    public function handle($params)
    {
        return new JsonApiResponse(200, ['status' => 'ok', 'echo' => $params['echo']]);
    }
}