<?php

namespace Ales0sa\WebPortfolio;

use Illuminate\Support\Facades\Facade;

class WebPortfolioFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'web-portfolio';
    }
}
