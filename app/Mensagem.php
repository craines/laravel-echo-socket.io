<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
  protected $fillable = ['mensagem', 'user_id'];
}
