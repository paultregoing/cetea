<?php

namespace App\Models;

use CodeIgniter\Model;

class PeopleModel extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'name';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'alreadyMadeTea'];
}
