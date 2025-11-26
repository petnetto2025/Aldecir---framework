<?php

namespace App\Models;

use CodeIgniter\Model;

class PrecosModel extends Model
{
    protected $table = 'precos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'price', 'benefits', 'highlight'];
    protected $returnType = 'array';
    protected $useTimestamps = false; 

    public function getHighlightedPlans()
    {
        return $this->where('highlight', 1)->findAll();
    }
}
