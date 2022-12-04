<?php

namespace App\Http\Virtual;

use OpenApi\Annotations as OA;


/**
 * @OA\Schema(
 *     title="Content request",
 *     description="Content request description",
 *     type="object",
 * )
 */
class ContactRequest
{
    /**
     * @OA\Property(
     *     title="Name",
     *     description="Name of contact",
     *     format="string",
     *     example="David Doe",
     * )
     */
    public string $name;


    /**
     * @OA\Property(
     *     title="Phone",
     *     description="Phone of contact",
     *     format="string",
     *     example="8999999999",
     * )
     */
    public string $phone;


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
