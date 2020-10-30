<?php
/**
 * User: jtodd
 * Date: 2020-10-29
 * Time: 19:12
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    protected $table = 'usage';
    protected $fillable = [
        'year',
        'month',
        'day',
        'total',
        'allowable',
        'remaining',
        'delta',
    ];
}
