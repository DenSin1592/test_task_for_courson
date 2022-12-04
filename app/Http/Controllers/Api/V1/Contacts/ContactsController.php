<?php

namespace App\Http\Controllers\Api\V1\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;


class ContactsController extends Controller
{

    public function __construct(
        private readonly ContactRepository $contactRepository
    )
    {}

    /**
     * @OA\Get(
     *     path="/contacts",
     *     operationId="contactsAll",
     *     tags={"Contacts"},
     *     summary="Get all contacts",
     *     security={
     *       {"Authorization": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     * )
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cont = $this->contactRepository->allForUser();

        return ContactResource::collection($cont);
    }


    public function indexFavorite(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cont = $this->contactRepository->allFavoriteForUser();

        return ContactResource::collection($cont);
    }


    public function store(ContactRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->contactRepository->create($request->validated());

        return \Response::json([], 204);
    }


    public function show(int $id): ContactResource
    {
        return new ContactResource($this->contactRepository->findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
