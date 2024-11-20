<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="feed_header d-flex">
        <h1 class="mb-4">Post List</h1>
        <form method="GET" action="/filter_post">
            <div class="post_filters d-flex">
                <h5 class="mr-3">Showing Post Types</h5>
                <div class="d-flex">
                    <div class="form-check mr-3">
                        <input class="form-check-input" type="checkbox" name="filters[]" value="News" id="news" 
                        <?php echo !isset($filters) || in_array('News', $filters) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="news">
                            News
                        </label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" type="checkbox" name="filters[]" value="Event" id="event" 
                        <?php echo !isset($filters) || in_array('Event', $filters) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="event">
                            Event
                        </label>
                    </div>

                    <div class="form-check mr-3">
                        <input class="form-check-input" type="checkbox" name="filters[]" value="Job" id="job" 
                        <?php echo !isset($filters) || in_array('Job', $filters) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="job">
                            Job
                        </label>
                    </div>

                    <div class="form-check mr-3">
                        <input class="form-check-input" type="checkbox" name="filters[]" value="Discussion" id="discussion" 
                        <?php echo !isset($filters) || in_array('Discussion', $filters) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="discussion">
                            Discussion
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="page_body">
        <?php if (empty($posts)): ?>
            <div class="no-data-message">
                <p>No data available</p>
            </div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="page_card" data-post-id="<?= $post->id; ?>">
                    <div class="card-body">
                        <div class="post_header d-flex">
                            <p class="card-title"><?= $post->title; ?></p>
                            <div class="user_name">
                                <?= $post->created_at; ?>
                                <div>
                                    <i class="fas fa-user" style="font-size: 20px; margin-right: 5px;"></i>
                                    <?= $post->first_name . ' ' . $post->last_name; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card_content">
                            <div>
                                <i class="fas fa-thumbs-up" style="font-size: 20px; margin-right: 5px;"></i>
                                <?= $post->likes_count; ?>
                            </div>
                            <div>
                                <i class="fas fa-comments" style="font-size: 20px; margin-left: 15px; margin-right: 5px;"></i>
                                <?= $post->comments_count; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>