<?php

namespace App\Models;

use App\Entities\Video;
use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'videos';
    protected $primaryKey       = 'Id';
    protected $useAutoIncrement = true;
    protected $returnType       = Video::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'CreatedAt';
    protected $updatedField  = 'UpdatedAt';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
