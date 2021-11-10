<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class multipleupload extends Model
{
    use HasFactory;

    protected $table = "multipleuploads";

    protected $fillable = ['ref_no','bban','name','amount','transaction_description'];
    // public $timestamp = false;

    public static function getMultipleUpload(){
        $records = DB::table('multipleuploads')->select('id','ref_no','bban','name','amount','transaction_description','created_at','updated_at');
        return $records;
    }
}
