<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';

// ----------------- geting all post for feed screen -------------------------- 
    public function get_posts_with_counts(array $filters = []): array
    {
        $query = $this->db->table('posts p')
            ->select('p.id, p.created_at, p.title, u.first_name, u.last_name, 
                 COUNT(DISTINCT l.id) AS likes_count, 
                 COUNT(DISTINCT c.id) AS comments_count')
            ->join('likes l', 'p.id = l.post_id', 'left')
            ->join('comments c', 'p.id = c.post_id', 'left')
            ->join('users u', 'p.user_id = u.id', 'left')
            ->groupBy('p.id');

            if (!empty($filters)) {
                $query->whereIn('p.type', $filters);
            }
            return $query->get()->getResult();
    }

// ----------------- get post meta data for single post  -------------------------- 
    public function get_post_details(int $postId): array
    {
        return $this->db->table('posts p')
            ->select('p.title, p.type, p.created_at, m.meta_key, m.meta_value,u.first_name, u.last_name')
            ->join('post_meta m', 'p.id = m.post_id', 'left')
            ->join('users u', 'p.user_id = u.id', 'left')
            ->where('p.id', $postId)
            ->get()
            ->getResult();
    }

}
