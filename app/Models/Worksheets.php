<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Worksheets
 *
 * @property int $id
 * @property int $user_id
 * @property int $company_id
 * @property string $name
 * @property string $form_questions
 * @property string $form_answers
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets newQuery()
 * @method static \Illuminate\Database\Query\Builder|Worksheets onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets query()
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets whereFormAnswers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets whereFormQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worksheets whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Worksheets withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Worksheets withoutTrashed()
 * @mixin \Eloquent
 */
class Worksheets extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'worksheets';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable=[
        "user_id",
        "company_id",
        "name",
        "form_questions",
        "form_answers",
        "status"

    ];

    protected $hidden=[

        'deleted_at'
    ];

    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [
            "user_id"=>'integer',
        ]);
    }
}
