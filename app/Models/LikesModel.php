<?php

namespace App\Models;

use CodeIgniter\Model;

class LikesModel extends Model
{
    protected $table = 'likes';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

// ----------------- get likes data for singler post  -------------------------- 
public function get_post_likes(int $postId): array
{
    return $this->db->table('likes l')
        ->select('l.id, l.created_at, u.first_name, u.last_name')
        ->join('users u', 'l.user_id = u.id', 'left')
        ->where('l.post_id', $postId)
        ->get()
        ->getResult();
}

}
