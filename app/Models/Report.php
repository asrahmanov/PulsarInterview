<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\HrReportTypes
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes newQuery()
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes query()
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReportTypes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes withTrashed()
 * @method static \Illuminate\Database\Query\Builder|HrReportTypes withoutTrashed()
 * @mixin \Eloquent
 * @property int $report_type_id
 * @property string|null $text_1
 * @property string|null $text_2
 * @property string|null $text_3
 * @property string|null $text_4
 * @property string|null $date_1
 * @property string|null $date_2
 * @property string|null $date_3
 * @property string|null $date_4
 * @property string|null $report_day
 * @property int $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDate1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDate2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDate3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDate4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereReportDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereReportTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereText1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereText2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereText3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereText4($value)
 * @property int $user_id
 * @property string|null $name_list
 * @property int $production
 * @property int $production_defect
 * @property int $control
 * @property int $control_defect
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereControl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereControlDefect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereNameList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereProduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereProductionDefect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUserId($value)
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
        "name_list",
        "production",
        "production_defect",
        "control",
        "control_defect",
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
