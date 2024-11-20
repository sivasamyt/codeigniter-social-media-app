<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $userModel;

    // ----------------- get comments data for single post  -------------------------- 
    public function get_post_comments(int $postId): array
    {
        return $this->db->table('comments c')
            ->select('c.id, c.comment, c.created_at, u.first_name, u.last_name')
            ->join('users u', 'c.user_id = u.id')
            ->where('c.post_id', $postId)
            ->orderBy('c.created_at', 'DESC')
            ->get()
            ->getResult();
    }
}
