<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gm_fastTypingModel extends Gm_fastTypingBaseModel {

    protected $table = 'gm_fastTypinginformation';

    protected $fillable = ['id', 'name', 'score', 'game_time', 'average_speed', 'level'];

    protected $hidden = ['count', 'id', 'deleted_at','created_at', 'updated_at'];
}
