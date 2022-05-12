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
 * @method static \Illuminate\Database\Eloquent\Builder|HrReport whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReport whereDate1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReport whereDate2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReport whereDate3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReport whereDate4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReport whereReportDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReport whereReportTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReport whereText1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReport whereText2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReport whereText3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HrReport whereText4($value)
 */
class HrReport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'report';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable=[
        "company_id",
        "report_type_id",
        "text_1",
        "text_2",
        "text_3",
        "text_4",
        "date_1",
        "date_2",
        "date_3",
        "date_4",
        "report_day"
    ];
    protected $hidden=[
        "created_at",
        "updated_at",
        'deleted_at'
    ];

    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [
            "report_type_id"=>'integer',
        ]);
    }
}
