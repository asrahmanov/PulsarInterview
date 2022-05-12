<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HrReport;
use Illuminate\Http\Request;

class HrReportController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     path="/api/hr-report",
     *     tags={"HR Report"},
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      ),
     * )
     */
    public function index()
    {
        return response(HrReport::get(), 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"HR Report"},
     *     path="/api/hr-report/get-by-report-day/{report_day}/{company_id}",
     *     @OA\Parameter( name="report_day", in="path", required=false, description="Получить все отчеты по дате", @OA\Schema( type="date" ) ),
     *     @OA\Parameter( name="company_id", in="path", required=false, description="", @OA\Schema( type="integer" ) ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      @OA\JsonContent(
     *     type="object",
     * )
     *      ),
     * )
     */
    public function getByReportDay($report_day, $company_id)
    {
        return HrReport::select()
            ->whereReportDay($report_day)
//            ->whereCompanyId($company_id)
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
     *     path="/api/hr-report",
     *     tags={"HR Report"},
     *     @OA\RequestBody(
     *    request="Create HR Report",
     *    description="Create HR Report Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="text_1",description="Текст 1", type="string", example="Тест"),
     *          @OA\Property(property="text_2",description="Текст 2", type="string", example="Тест"),
     *          @OA\Property(property="text_3",description="Текст 3", type="string", example="Тест"),
     *          @OA\Property(property="text_4",description="Текст 4", type="string", example="Тест"),
     *          @OA\Property(property="date_1",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_2",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_3",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_4",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="report_type_id",description="1", type="integer", example="1"),
     *
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="text_1",description="Текст 1", type="string", example="Тест"),
     *          @OA\Property(property="text_2",description="Текст 2", type="string", example="Тест"),
     *          @OA\Property(property="text_3",description="Текст 3", type="string", example="Тест"),
     *          @OA\Property(property="text_4",description="Текст 4", type="string", example="Тест"),
     *          @OA\Property(property="date_1",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_2",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_3",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_4",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="report_type_id",description="1", type="integer", example="1"),
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
        $entity = new HrReport();

        $validator = $entity->validate($request->all());
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $entity->fill($request->only($entity->getFillable()))->save();

        return response(
            HrReport::whereId($entity->id)->first()->toArray(), 200);
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
     *     path="/api/hr-report/{id}",
     *     tags={"HR Report"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\RequestBody(
     *    request="Update HR Report",
     *    description="Update HR Report Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="text_1",description="Текст 1", type="string", example="Тест"),
     *          @OA\Property(property="text_2",description="Текст 2", type="string", example="Тест"),
     *          @OA\Property(property="text_3",description="Текст 3", type="string", example="Тест"),
     *          @OA\Property(property="text_4",description="Текст 4", type="string", example="Тест"),
     *          @OA\Property(property="date_1",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_2",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_3",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_4",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="report_type_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="text_1",description="Текст 1", type="string", example="Тест"),
     *          @OA\Property(property="text_2",description="Текст 2", type="string", example="Тест"),
     *          @OA\Property(property="text_3",description="Текст 3", type="string", example="Тест"),
     *          @OA\Property(property="text_4",description="Текст 4", type="string", example="Тест"),
     *          @OA\Property(property="date_1",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_2",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_3",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="date_4",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
     *          @OA\Property(property="report_type_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
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
    public function update(Request $request, $id)
    {
        $entity = HrReport::whereId($id)->first();
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
     *     path="/api/hr-report/{id}",
     *     tags={"HR Report"},
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
        $is_deleted = (bool)HrReport::whereId($id)->delete();

        return response(['is_deleted' => $is_deleted], $is_deleted ? 200 : 400);
    }
}
