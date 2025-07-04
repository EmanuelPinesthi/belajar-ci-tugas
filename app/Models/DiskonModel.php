<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table = 'diskon';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tanggal', 'nominal', 'created_at', 'updated_at'
    ];
    
    /**
     * Get diskon berdasarkan tanggal
     */
    public function getDiskonByDate($date)
    {
        return $this->where('tanggal', $date)->first();
    }
    
    /**
     * Check apakah tanggal sudah ada diskon
     */
    public function isTanggalExists($date, $excludeId = null)
    {
        $builder = $this->where('tanggal', $date);
        
        if ($excludeId) {
            $builder->where('id !=', $excludeId);
        }
        
        return $builder->countAllResults() > 0;
    }
}