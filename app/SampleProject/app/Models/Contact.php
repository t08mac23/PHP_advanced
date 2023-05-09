<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

      // Primary Key
      public $primaryKey = 'id';
      // Timestamps
    //   public $timestamps = true;

      protected $fillable = [
          'name',
          'kana',
          'tel',
          'email',
          'body',
      ];
}
