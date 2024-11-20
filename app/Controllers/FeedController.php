<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentsModel;
use App\Models\LikesModel;
use App\Models\PostModel;

class FeedController extends BaseController
{
    private PostModel $post_model;
    private CommentsModel $coments_model;
    private LikesModel $likes_model;


    public function __construct()
    {
        $this->post_model = new PostModel();
        $this->coments_model = new CommentsModel();
        $this->likes_model = new LikesModel();
    }

    // ----------------- Post data get for post page First loading time  -------------------------- 
    public function index()
    {
        $data['posts'] = $this->post_model->get_posts_with_counts();
        return view('feed', $data);
    }

    // ----------------- Post data get for post page when filters changed  -------------------------- 
    public function get_all_post()
    {
        $filters = $this->request->getGet('filters') ?? [];
        if (!empty($filters)) {
            $data['posts'] = $this->post_model->get_posts_with_counts($filters);
        } else {
            $data['posts'] = '';
        }
        $data['filters'] = $filters;
        return view('feed', $data);
    }

    // -----------------  get single Post data for post details popup  -------------------------- 
    public function get_post_details($post_id)
    {
        $post_details = $this->post_model->get_post_details($post_id);
        $comments = $this->coments_model->get_post_comments($post_id);
        $likes = $this->likes_model->get_post_likes($post_id);

        if ($post_details) {
            return $this->response->setJSON([
                'success' => true,
                'post' => $post_details,
                'comments' => $comments,
                'likes' => $likes,
            ]);
        }
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Post not found',
        ]);
    }
}

