<?php

declare(strict_types=1);

namespace App\Handler\User;

use App\Action\User\GetAllUsersAction;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class GetAllUsersHandler implements RequestHandlerInterface
{
    /** @var GetAllUsersAction  */
    private $action;

    /**
     * GetAllUsersHandler constructor.
     *
     * @param GetAllUsersAction $action
     */
    public function __construct(GetAllUsersAction $action)
    {
        $this->action = $action;
    }

    /**
     * Lista todos os usuários ou parte deles em formato JSON
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse($this->action->action());
    }
}