<?php

namespace App\Http\Controllers;

use App\CommandBus\CommandBus;
use App\Domain\Command\CreateProduct;
use Illuminate\Contracts\Routing\UrlGenerator;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController
{
    const ROUTE_LIST = 'products.list';
    const ROUTE_SHOW = 'product.show';
    const ROUTE_CREATE = 'product.create';

    private CommandBus $commandBus;
    private UrlGenerator $urlGenerator;

    public function __construct(CommandBus $commandBus, UrlGenerator $urlGenerator)
    {
        $this->commandBus = $commandBus;
        $this->urlGenerator = $urlGenerator;
    }

    public function createProduct(Request $request): Response
    {
        /**
         * TODO: request data validation:
         * name: not null, 255 chars max
         * price: not null, numeric only (no floats), between 0 and MAX_INT
         *
         * in case of invalid data, return HTTP 422 with error details in json response
         */
        $id = Uuid::uuid4()->toString();

        $this->commandBus->dispatch(new CreateProduct(
            $id,
            $request->request->get('name'),
            (int) $request->request->get('price')
        ));
        
        return new Response('', Response::HTTP_CREATED, [
            'Location' => $this->urlGenerator->route(self::ROUTE_SHOW, ['id' => $id]),
        ]);
    }
}
