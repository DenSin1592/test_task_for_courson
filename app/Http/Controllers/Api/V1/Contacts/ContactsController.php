<?php

namespace App\Http\Controllers\Api\V1\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\ContactFavoriteRequest;
use App\Http\Requests\Contacts\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Repositories\ContactRepository;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


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
    public function index(): \Illuminate\Http\JsonResponse
    {
        $cont = $this->contactRepository->allForUser();

        return ContactResource::collection($cont)
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }


    public function indexFavorite(): \Illuminate\Http\JsonResponse
    {
        $cont = $this->contactRepository->allFavoriteForUser();

        return ContactResource::collection($cont)
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }


    public function store(ContactRequest $request): \Illuminate\Http\JsonResponse
    {
        return (new ContactResource($this->contactRepository->create($request->validated())))
        ->response()
        ->setStatusCode(ResponseAlias::HTTP_CREATED);
    }


    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        return (new ContactResource($this->contactRepository->findOrFail($id)))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }


    public function update(ContactRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        return (new ContactResource($this->contactRepository->update($id, $request->validated())))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }


    public function updateFavorite(ContactFavoriteRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        return (new ContactResource($this->contactRepository->update($id, $request->validated())))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }


    public function destroy(int $id)
    {
        $result = $this->contactRepository->delete($id);

        if(!$result){
            return \Response::json([], ResponseAlias::HTTP_NO_CONTENT);
        }
        return \Response::json([], ResponseAlias::HTTP_NO_CONTENT);
    }
}
