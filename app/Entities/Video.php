<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Video extends Entity
{
    protected $datamap = [];
    protected $dates   = ['CreatedAt', 'UpdatedAt', 'DeletedAt'];
    protected $casts   = [];
}
