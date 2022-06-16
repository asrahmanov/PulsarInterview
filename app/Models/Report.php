<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Report
 *
 * @property int $id
 * @property int $user_id
 * @property int $company_id
 * @property string|null $report_day
 * @property string|null $launch_plan
 * @property int $launch_fact
 * @property int $fact_of_transfer_to_otk
 * @property int $fact_of_transfer_to_warehouse
 * @property int $launch_previously
 * @property int $plan_of_transfer_to_otk
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Query\Builder|Report onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereFactOfTransferToOtk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereFactOfTransferToWarehouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereLaunchFact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereLaunchPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereLaunchPreviously($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report wherePlanOfTransferToOtk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereReportDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Report withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Report withoutTrashed()
 * @mixin \Eloquent
 */
class Report extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'report';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable=[
        "user_id",
        "company_id",
        "report_day",
        "launch_plan",
        "launch_fact",
        "fact_of_transfer_to_otk",
        "fact_of_transfer_to_warehouse",
        "launch_previously",
        "plan_of_transfer_to_otk"


    ];



    protected $hidden=[
        "created_at",
        "updated_at",
        'deleted_at'
    ];

    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [
            "user_id"=>'integer',
        ]);
    }
}
