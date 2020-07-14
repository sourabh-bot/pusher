<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //

    protected $table = 'flight';

    protected $primaryKey = 'flight_id';

    public $incrementing = false;

    protected $keyType = 'string';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $attributes = [
        'name' => 'sample',
    ];
}
