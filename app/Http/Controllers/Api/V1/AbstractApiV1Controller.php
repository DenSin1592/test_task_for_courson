<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\AbstractApiController;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="API documentation",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="wanderer1592@gmail.com"
 *     ),
 * )
 * @OA\Tag(
 *     name="Contacts",
 *     description="Contacts",
 * )
 * @OA\Server(
 *     description="API server",
 *     url="http://localhost:3000/api/v1"
 * )
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     name="Authorization",
 *     securityScheme="Authorization"
 * )
 */
abstract class AbstractApiV1Controller extends AbstractApiController
{

}
