<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prospect extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'information', 'cin', 'phone', 'status',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function excel_file()
    {
        return $this->belongsTo(ExcelFile::class);
    }

    public function prospect_histories()
    {
        return $this->hasMany(ProspectHistory::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
