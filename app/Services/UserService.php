<?php

namespace App\Services;

use App\Models\User;

class UserService
{

  public static function getAll()
  {
    $users = User::all();
    return $users;
  }
}