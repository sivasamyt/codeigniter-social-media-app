<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostsSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        $types = ['News', 'Event', 'Job', 'Discussion'];


        for ($i = 1; $i <= 50; $i++) {
            $randomType = $types[array_rand($types)];

            $db->table('posts')->insert([
                'title'  => 'Sample '.$randomType.' ' . $i,
                'user_id' => rand(1, 3), 
                'type'   => $randomType, 
                'created_at'  => date('Y-m-d H:i:s'),
            ]);

            $post_id = $db->insertID();

            $postMeta = [];

  
            switch ($randomType) {
                case 'Event':
                    $postMeta = [
                        [
                            'post_id'    => $post_id,
                            'meta_key'   => 'Start date',
                            'meta_value' => '2024-12-01',
                        ],
                        [
                            'post_id'    => $post_id,
                            'meta_key'   => 'Location',
                            'meta_value' => 'India',
                        ],
                    ];
                    break;

                case 'Job':
                    $postMeta = [
                        [
                            'post_id'    => $post_id,
                            'meta_key'   => 'company_name',
                            'meta_value' => 'Vaave',
                        ],
                        [
                            'post_id'    => $post_id,
                            'meta_key'   => 'Job location',
                            'meta_value' => 'India',
                        ],
                        [
                            'post_id'    => $post_id,
                            'meta_key'   => 'Job area',
                            'meta_value' => 'Software Development',
                        ],
                    ];
                    break;

                case 'News':
                    $postMeta = [
                        [
                            'post_id'    => $post_id,
                            'meta_key'   => 'published_date',
                            'meta_value' => '2024-11-01',
                        ],
                        [
                            'post_id'    => $post_id,
                            'meta_key'   => 'source',
                            'meta_value' => 'Tech News',
                        ],
                    ];
                    break;

                case 'Discussion':
                    $postMeta = [
                        [
                            'post_id'    => $post_id,
                            'meta_key'   => 'discussion_topic',
                            'meta_value' => 'Codeigniter Project',
                        ],
                        [
                            'post_id'    => $post_id,
                            'meta_key'   => 'participants',
                            'meta_value' => 'Mike, Mohamed, manny',
                        ],
                    ];
                    break;
            }

            $db->table('post_meta')->insertBatch($postMeta);

            $db->table('comments')->insert([
                'post_id'  => $post_id,
                'user_id' => rand(1, 3), 
                'comment'   => 'comment of post '.$post_id,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $db->table('likes')->insert([
                'post_id'  => $post_id,
                'user_id' => rand(1, 3), 
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        echo "50 mock posts with post meta have been inserted.\n";
    }
}
