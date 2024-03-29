<?php

namespace App\Models;

use App\Entities\Voter;
use CodeIgniter\Model;

class VoterModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'voters';
    protected $primaryKey       = 'Id';
    protected $useAutoIncrement = true;
    protected $returnType       = Voter::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Fullname', 'Gender', 'Address', 'PhoneNumber', 'Email', 'VoterRegNumber','ImagePath'];

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
