<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/24/2021
 * Time: 1:37 PM
 */
namespace Camdigikey\Model;

use Illuminate\Database\Eloquent\Model;

class CamdigikeyAuthorization extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "camdigikey_authorizations";


    protected $fillable = [
        "request_token",
        "access_token",
        "user_info",
        "full_response",
        "created_at",
        "updated_at"
    ];

    protected $primaryKey ="id";

}