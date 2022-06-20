<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     path="/api/production-report",
     *     tags={"Production report"},
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      ),
     * )
     */
    public function index()
    {
        return response(Report::get(), 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Production report"},
     *     path="/api/production-report/get-by-report-day/{report_day}/{company_id}",
     *     @OA\Parameter( name="report_day", in="path", required=false, description="Получить все отчеты по дате", @OA\Schema( type="date" ) ),
     *     @OA\Parameter( name="company_id", in="path", required=false, description="", @OA\Schema( type="integer" ) ),
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
    public function getByReportDay($report_day, $company_id)
    {
        if ($company_id == 0) {
            return Report::select()
                ->where(['report_day' => $report_day])
                ->get();

        } else {
            return Report::select()
                ->where(['report_day' => $report_day,
                    'company_id' => $company_id])
                ->get();
        }

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Production report"},
     *     path="/api/production-report/get-by-report-between/{report_day_from}/{report_day_to}/{company_id}",
     *     @OA\Parameter( name="report_day_from", in="path", required=false, description="", @OA\Schema( type="date" ) ),
     *     @OA\Parameter( name="report_day_to", in="path", required=false, description="", @OA\Schema( type="date" ) ),
     *     @OA\Parameter( name="company_id", in="path", required=false, description="", @OA\Schema( type="integer" ) ),
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
    public function getByReportBetween($report_day_from, $report_day_to, $company_id)
    {

        if ($company_id == 0) {
            return Report::select()
                ->where('report_day', '>=', $report_day_from)
                ->where('report_day', '<=', $report_day_to)
                ->orderBy('report_day', 'ASC')
//                ->where('company_id', '>=', $company_id)
                ->get();
        } else {
            return Report::select()
                ->where('report_day', '>=', $report_day_from)
                ->where('report_day', '<=', $report_day_to)
                ->where('company_id', '=', $company_id)
                ->orderBy('report_day', 'ASC')
                ->get();
        }

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
     *     path="/api/production-report",
     *     tags={"Production report"},
     *     @OA\RequestBody(
     *    request="Create Production report",
     *    description="Create Production report Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="user_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="launch_plan",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="launch_fact",description="1", type="integer", example="1"),
     *          @OA\Property(property="fact_of_transfer_to_otk",description="1", type="integer", example="1"),
     *          @OA\Property(property="fact_of_transfer_to_warehouse",description="1", type="integer", example="1"),
     *          @OA\Property(property="launch_previously",description="1", type="integer", example="1"),
     *          @OA\Property(property="plan_of_transfer_to_otk",description="1", type="integer", example="1"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
     *
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
     *          @OA\Property(property="launch_plan",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="launch_fact",description="1", type="integer", example="1"),
     *          @OA\Property(property="fact_of_transfer_to_otk",description="1", type="integer", example="1"),
     *          @OA\Property(property="fact_of_transfer_to_warehouse",description="1", type="integer", example="1"),
     *          @OA\Property(property="launch_previously",description="1", type="integer", example="1"),
     *          @OA\Property(property="plan_of_transfer_to_otk",description="1", type="integer", example="1"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
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
        $entity = new Report();

        $validator = $entity->validate($request->all());
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $report = Report::whereReportDay($request->report_day)->first();

        if (isset($report)) {
            $report->fill($request->only($entity->getFillable()))->save();
            return response(
                Report::whereId($report->id)->first()->toArray(), 200);
        } else {
            $entity->fill($request->only($entity->getFillable()))->save();
            return response(
                Report::whereId($entity->id)->first()->toArray(), 200);
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
     *     path="/api/production-report/{id}",
     *     tags={"Production report"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\RequestBody(
     *    request="Update Production report",
     *    description="Update Production report Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="user_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="company_id",description="1", type="integer", example="1"),
     *          @OA\Property(property="launch_plan",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="launch_fact",description="1", type="integer", example="1"),
     *          @OA\Property(property="fact_of_transfer_to_otk",description="1", type="integer", example="1"),
     *          @OA\Property(property="fact_of_transfer_to_warehouse",description="1", type="integer", example="1"),
     *          @OA\Property(property="launch_previously",description="1", type="integer", example="1"),
     *          @OA\Property(property="plan_of_transfer_to_otk",description="1", type="integer", example="1"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
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
     *          @OA\Property(property="launch_plan",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="launch_fact",description="1", type="integer", example="1"),
     *          @OA\Property(property="fact_of_transfer_to_otk",description="1", type="integer", example="1"),
     *          @OA\Property(property="fact_of_transfer_to_warehouse",description="1", type="integer", example="1"),
     *          @OA\Property(property="launch_previously",description="1", type="integer", example="1"),
     *          @OA\Property(property="plan_of_transfer_to_otk",description="1", type="integer", example="1"),
     *          @OA\Property(property="report_day",description="2022-04-01", type="date", example="2022-04-01"),
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
        $entity = Report::whereId($id)->first();
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
     *     path="/api/production-report/{id}",
     *     tags={"Production report"},
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
        $is_deleted = (bool)Report::whereId($id)->delete();

        return response(['is_deleted' => $is_deleted], $is_deleted ? 200 : 400);
    }
}
