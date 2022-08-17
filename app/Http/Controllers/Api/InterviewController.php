<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Worksheets;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     path="/api/interview-worksheets",
     *     tags={"Interview worksheets"},
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      ),
     * )
     */
    public function index()
    {
        return response(Worksheets::get(), 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Interview worksheets"},
     *     path="/api/interview-worksheets/get-by-name/{name}",
     *     @OA\Parameter( name="name", in="path", required=false, description="Имя задания", @OA\Schema( type="string" ) ),
     *     @OA\Parameter( name="company_id", in="path", required=false, description="1", @OA\Schema( type="integer" ) ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      @OA\JsonContent(
     *     type="object",
     *                      )
     *                  ),
     *      )
     */
    public function getByName($name, $company_id)
    {
        if ($company_id == 0) {
            return Worksheets::select()
                ->where(['name' => $name])
                ->get();

        } else {
            return Worksheets::select()
                ->where(['name' => $name,
                    'company_id' => $company_id])
                ->get();
        }

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Interview worksheets"},
     *     path="/api/interview-worksheets/get-by-userId/{user_id}",
     *     @OA\Parameter( name="user_id", in="path", required=false, description="1", @OA\Schema( type="integer" ) ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      @OA\JsonContent(
     *     type="object",
     *                      )
     *                  ),
     *      )
     */
    public function getByUserId($user_id)
    {
        if ($user_id == 0) {
            return Worksheets::get();

        } else {
            return Worksheets::select()
                ->where(['user_id' => $user_id])
                ->get();
        }

    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Interview worksheets"},
     *     path="/api/interview-worksheets/get-by-id/{id}",
     *     @OA\Parameter( name="id", in="path", required=false, description="1", @OA\Schema( type="integer" ) ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      @OA\JsonContent(
     *     type="object",
     *                      )
     *                  ),
     *      )
     */
    public function getById($id)
    {

            return Worksheets::select()
                ->where(['id' => $id])
                ->get();

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Post(
     *     path="/api/interview-worksheets",
     *     tags={"Interview worksheets"},
     *     @OA\RequestBody(
     *    request="Create Interview worksheets",
     *    description="Create Interview worksheets Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="user_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="form_questions",description="2022-04-01", type="json", example=""),
     *          @OA\Property(property="form_answers",description="2022-04-01", type="json", example=""),
     *          @OA\Property(property="status",description="2022-04-01", type="string", example="new"),
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="user_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="form_questions",description="2022-04-01", type="json", example=""),
     *          @OA\Property(property="form_answers",description="2022-04-01", type="json", example=""),
     *          @OA\Property(property="status",description="2022-04-01", type="string", example="new"),
     *         )
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors",
     *      @OA\JsonContent(
     *     type="object",
     *     title="errors",
     *     description="errors object",
     *     @OA\Property(
     *     property="errors",
     *     type="object",
     *     title="Validation errors",
     *     description="Validation errors object",
     *     @OA\Property(property="field1", type="array", @OA\Items(example="The field1 field is required.")),
     * )
     * )
     *      ),
     * )
     */
    public function store(Request $request)
    {

        $entity = new Worksheets();

        $validator = $entity->validate($request->all());
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $worksheets = Worksheets::whereId($request->id)->first();

        if (isset($report)) {
            $worksheets->fill($request->only($entity->getFillable()))->save();
            return response(
                Worksheets::whereId($worksheets->id)->first()->toArray(), 200);
        } else {
            $entity->fill($request->only($entity->getFillable()))->save();
            return response(
                Worksheets::whereId($entity->id)->first()->toArray(), 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @OA\Patch (
     *     path="/api/interview-worksheets/{id}",
     *     tags={"Interview worksheets"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\RequestBody(
     *    request="Update Interview worksheets",
     *    description="Update Interview worksheets Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="user_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="form_questions",description="2022-04-01", type="text", example=""),
     *          @OA\Property(property="form_answers",description="2022-04-01", type="text", example=""),
     *          @OA\Property(property="status",description="2022-04-01", type="string", example="new"),
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="user_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="form_questions",description="2022-04-01", type="json", example=""),
     *          @OA\Property(property="form_answers",description="2022-04-01", type="json", example=""),
     *          @OA\Property(property="status",description="2022-04-01", type="string", example="new"),
     *
     *         )
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors",
     *      @OA\JsonContent(
     *     type="object",
     *     title="errors",
     *     description="errors object",
     *     @OA\Property(
     *     property="errors",
     *     type="object",
     *     title="Validation errors",
     *     description="Validation errors object",
     *     @OA\Property(property="field1", type="array", @OA\Items(example="The field1 field is required.")),
     *     @OA\Property(property="field2", type="array",  @OA\Items(example="The field2 field is required."))
     * )
     * )
     *      ),
     * )
     */
    public function update(Request $request)
    {
        $entity = Worksheets::whereId($request->id)->first();
        if (!$entity) {
            return response([], 404);
        }

        $validator = $entity->validate($request->all(), false);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $entity->fill($request->only($entity->getFillable()));

        if ($entity->save()) {

            return response($entity->toArray(), 200);
        } else {
            return response('anyError', 500);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @OA\Delete  (
     *     path="/api/interview-worksheets/{id}",
     *     tags={"Interview worksheets"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Delete",
     *          @OA\JsonContent(
     *             type="object",
     *              @OA\Property(property="is_deleted", type="boolean", example=true),
     *         )
     *      ),
     *     @OA\Response(
     *          response=400,
     *          description="Error Delete",
     *          @OA\JsonContent(
     *             type="object",
     *              @OA\Property(property="is_deleted", type="boolean", example=false),
     *         )
     *      ),
     *
     * )
     */
    public function destroy($id)
    {
        $is_deleted = (bool)Worksheets::whereId($id)->delete();

        return response(['is_deleted' => $is_deleted], $is_deleted ? 200 : 400);
    }
}
