<?php
/**
 * This file is part of the BEAR.Package package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Package\Provide\Application;

use BEAR\Package\Dev\Debug\ExceptionHandle\ExceptionHandlerInterface;
use BEAR\Package\Provide\ResourceView\UriMapperInterface;
use BEAR\Resource\ResourceObject as Page;
use BEAR\Resource\ResourceInterface;
use BEAR\Sunday\Extension\Application\AppInterface;
use BEAR\Sunday\Extension\ApplicationLogger\ApplicationLoggerInterface;
use BEAR\Sunday\Extension\Router\RouterInterface;
use BEAR\Sunday\Extension\WebResponse\ResponseInterface;
use Ray\Di\InjectorInterface;
use Ray\Di\Di\Inject;

/**
 * Abstract Application
 */
abstract class AbstractApp implements AppInterface
{
    /**
     * Dependency injector
     *
     * @var InjectorInterface
     */
    public $injector;

    /**
     * Resource client
     *
     * @var ResourceInterface
     */
    public $resource;

    /**
     * Response
     *
     * @var ResponseInterface
     */
    public $response;

    /**
     * Exception handler
     *
     * @var ExceptionHandlerInterface
     */
    public $exceptionHandler;

    /**
     * Router
     *
     * @var RouterInterface
     */
    public $router;

    /**
     * Resource logger
     *
     * @var ApplicationLoggerInterface
     */
    public $logger;

    /**
     * Response page object
     *
     * @var Page
     */
    public $page;

    /**
     * Uri Mapper
     *
     * @var UriMapperInterface
     */
    public $uriMapper;

    /**
     * @param InjectorInterface          $injector         Dependency Injector
     * @param ResourceInterface          $resource         Resource client
     * @param ExceptionHandlerInterface  $exceptionHandler Exception handler
     * @param ResponseInterface          $response         Web / Console response
     * @param RouterInterface            $router           URI Router
     *
     * @Inject
     */
    public function __construct(
        InjectorInterface $injector,
        ResourceInterface $resource,
        ResponseInterface $response,
        RouterInterface $router
    ) {
        $this->injector = $injector;
        $this->resource = $resource;
        $this->response = $response;
        $this->router = $router;
    }

    /**
     * @param UriMapperInterface $uriMapper
     *
     * @Inject(optional  = true)
     */
    public function setUriMapper(UriMapperInterface $uriMapper)
    {
        $this->uriMapper = $uriMapper;
    }

    /**
     * @param ApplicationLoggerInterface $logger
     *
     * @Inject(optional  = true)
     */
    public function setApplicationLogger(ApplicationLoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    /**
     * @param ExceptionHandlerInterface $exceptionHandler
     *
     * @Inject(optional  = true)
     */
    public function setExceptionHandler(ExceptionHandlerInterface $exceptionHandler)
    {
        $this->exceptionHandler = $exceptionHandler;
    }
}
