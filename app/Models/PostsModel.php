<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    //protected $returnType       = 'array';
    protected $returnType = \App\Entities\Post::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "title",
        "content",
        "published"
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        "title" => "required|max_length[255]",
        "content" => "required",
        "published" => "required",
    ];
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



    function findAllPublished()
    {
        $sql = "SELECT * FROM `posts` WHERE `published` = 1 ORDER BY `id` DESC";
        $query = $this->db->query($sql);
        //dd($query->getResultArray());
        return $query->getResultArray();
    }

    function findByIdPublished($id)
    {
        $sql = "SELECT * FROM `posts` WHERE `published` = 1 AND `id` = :id:";
        $query = $this->db->query($sql, [
            "id" => $id
        ]);
        //dd($query->getResultArray()[0]);
        return $query->getResultArray()[0];
    }
}
