<?php

namespace App\Presenters;

use Nette\Application\UI\Presenter;

use Tomaj\NetteApi\ApiDecider;
use Tomaj\NetteApi\Component\ApiConsoleControl;
use Tomaj\NetteApi\Component\ApiListingControl;

class HomepagePresenter extends Presenter 
{
	private $apiDecider;

	public function __construct(ApiDecider $apiDecider)
	{
		parent::__construct();
        $this->apiDecider = $apiDecider;
	}

	public function renderShow($method, $version, $package, $apiAction)
    {
    }

    public function renderApi()
    {

    }

    protected function createComponentApiListing()
    {
        $apiListing = new ApiListingControl($this, 'apiListingControl', $this->apiDecider);
        $apiListing->onClick(function ($method, $version, $package, $apiAction) {
            $this->redirect('show', $method, $version, $package, $apiAction);
        });
        return $apiListing;
    }

    protected function createComponentApiConsole()
    {
        $api = $this->apiDecider->getApiHandler($this->params['method'], $this->params['version'], $this->params['package'], isset($this->params['apiAction']) ? $this->params['apiAction'] : null);
        $apiConsole = new ApiConsoleControl($this->getHttpRequest(), $api['endpoint'], $api['handler'], $api['authorization']);
        return $apiConsole;
    }
}
