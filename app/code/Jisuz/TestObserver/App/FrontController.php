<?php

namespace Jisuz\TestObserver\App;

class FrontController extends \Magento\Framework\App\FrontController
{
    protected $routerList;

    protected $response;

    protected $logger;

    public function __construct(
        \Magento\Framework\App\RouterListInterface $routerList,
        \Magento\Framework\App\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::__construct($routerList, $response);
        $this->routerList = $routerList;
        $this->response = $response;
        $this->logger = $logger;
    }

    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        foreach ($this->routerList as $router) {
            $this->logger->info(get_class($router));
        }
        return parent::dispatch($request);
    }
}
