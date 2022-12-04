<?php

namespace App\Http\Virtual;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Favorite content  request",
 *     description="Content favorite request description",
 *     type="object",
 * )
 */
class ContactFavoriteRequest
{

    /**
     * @OA\Property(
     *     title="Favorite",
     *     description="Favorite contact",
     *     format="bool",
     *     example="1",
     * )
     */
    public string $favorite;

}
