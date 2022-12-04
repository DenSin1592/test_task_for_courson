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
    ){}

    /**
     * @OA\Get(
     *     path="/contact",
     *     operationId="contactsAll",
     *     tags={"Contact"},
     *     summary="Get all contacts",
     *     security={
     *       {"Authorization": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Not found",
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Authorization failed",
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unknown error",
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


    /**
     * @OA\Get(
     *     path="/contact/favorite",
     *     operationId="contactsFavorite",
     *     tags={"Contact"},
     *     summary="Get favorite contacts",
     *     security={
     *       {"Authorization": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Not found",
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Authorization failed",
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unknown error",
     *     ),
     * )
     */
    public function indexFavorite(): \Illuminate\Http\JsonResponse
    {
        $cont = $this->contactRepository->allFavoriteForUser();

        return ContactResource::collection($cont)
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }


    /**
     * @OA\Post(
     *     path="/contact",
     *     operationId="contactsCreate",
     *     tags={"Contact"},
     *     summary="Create contact",
     *     security={
     *       {"Authorization": {}},
     *     },
     *     @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/ContactRequest")
     *      ),
     *      @OA\Response(
     *         response="201",
     *         description="Operation was success",
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Authorization failed",
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unknown error",
     *     ),
     * )
     */
    public function store(ContactRequest $request): \Illuminate\Http\JsonResponse
    {
        return (new ContactResource($this->contactRepository->create($request->validated())))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *     path="/contact/{id}",
     *     operationId="contactShow",
     *     tags={"Contact"},
     *     summary="Show contact",
     *     security={
     *       {"Authorization": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of contact",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Not found",
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Authorization failed",
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unknown error",
     *     ),
     * )
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        return (new ContactResource($this->contactRepository->findOrFail($id)))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @OA\Put(
     *     path="/contact/{id}",
     *     operationId="contactUpdate",
     *     tags={"Contact"},
     *     summary="Update contact",
     *     security={
     *       {"Authorization": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of contact",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/ContactRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Not found",
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Authorization failed",
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unknown error",
     *     ),
     * )
     */
    public function update(ContactRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        return (new ContactResource($this->contactRepository->update($id, $request->validated())))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @OA\Patch(
     *     path="/contact/favorite/{id}",
     *     operationId="contactFavoriteUpdate",
     *     tags={"Contact"},
     *     summary="Add or remove contact to favorite",
     *     security={
     *       {"Authorization": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of contact",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/ContactFavoriteRequest")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Not found",
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Authorization failed",
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unknown error",
     *     ),
     * )
     */
    public function updateFavorite(ContactFavoriteRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        return (new ContactResource($this->contactRepository->update($id, $request->validated())))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @OA\Delete(
     *     path="/contact/{id}",
     *     operationId="contactDelete",
     *     tags={"Contact"},
     *     summary="Delete contact",
     *     security={
     *       {"Authorization": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of contact",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Not found",
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Authorization failed",
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unknown error",
     *     ),
     * )
     */
    public function destroy(int $id)
    {
        $result = $this->contactRepository->delete($id);

        if (!$result) {
            return \Response::json([], ResponseAlias::HTTP_NOT_FOUND);
        }
        return \Response::json([], ResponseAlias::HTTP_NO_CONTENT);
    }
}
