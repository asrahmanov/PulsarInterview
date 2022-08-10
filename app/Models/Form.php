<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Form
 *
 * @property int $id
 * @property string $form
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Form newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Form newQuery()
 * @method static \Illuminate\Database\Query\Builder|Form onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Form query()
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Form whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Form withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Form withoutTrashed()
 * @mixin \Eloquent
 */
class Form extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'form';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable=[
        "form",
    ];

    protected $hidden=[

        'deleted_at'
    ];

    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [

        ]);
    }
}
