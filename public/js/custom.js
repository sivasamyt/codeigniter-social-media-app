$(document).ready(function () {
    $('.post_filters').on('change', 'input[type="checkbox"]', function () {
        $('form').submit();
    });
    $('.page_card').on('click', function () {
        var postId = $(this).data('post-id');
        $.ajax({
            url: 'post/details/' + postId,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#post_details_modal').modal('show');
                    $('#post_values').empty();
                    $('#comment_values').empty();
                    $('#like_values').empty();
                    $('#modal_comment_title').empty();
                    $('#modal_like_title').empty();
                    $('.user_name').empty();
                    $('.modal_post_content').removeClass('with-divider');
                    $('.modal_comment_content').removeClass('with-divider');
                    let title = response.post[0].type + ' : ' + response.post[0].title;
                    $('#post_details_modal_label').text(title);                    
                    let author_detail = `
                                ${response.post[0].created_at}
                                <div>
                                    <i class="fas fa-user" style="font-size: 20px; margin-right: 5px;"></i>
                                    ${response.post[0].first_name + ' ' + response.post[0].last_name}
                                </div>` ;
                    $('.user_name').append(author_detail)
                    response.post.forEach(post => {
                        let meta_group = `
                        <div class="col-4 meta-group">
                            <p class="meta-key">${post.meta_key ?? ''}</p>
                            <p class="meta-value">${post.meta_value ?? ''}</p>
                        </div>`;
                        $('#post_values').append(meta_group);
                    });
                    if (response.comments && response.comments.length > 0) {
                        $('.modal_post_content').addClass('with-divider');
                        $('#modal_comment_title').text('Comments (' + response.comments.length + ')');
                        response.comments.forEach(comment => {
                            let meta_group = `
                        <div class="meta-group">
                            <div class="Comment_user">
                                <p class="comment_author"><i class="fas fa-user" style="font-size: 12px; margin-right: 5px;"></i>
                                    ${comment.first_name + ' ' + comment.last_name}</p> |
                                <p class="comment_date">${comment.created_at ?? 'Not Found'}</p>
                            </div>
                            <p class="comment_text">${comment.comment}</p>
                        </div> `;
                            $('#comment_values').append(meta_group);
                        });
                    }
                    if (response.likes && response.likes.length > 0) {
                        $('.modal_comment_content').addClass('with-divider');
                        $('#modal_like_title').text('Likes (' + response.likes.length + ')');
                        response.likes.forEach(like => {
                            let meta_group = `
                        <div class="meta-group">
                            <p class="like_author"><i class="fas fa-user" style="font-size: 12px; margin-right: 5px;"></i>
                                ${like.first_name + ' ' + like.last_name}</p>
                        </div> `;
                            $('#like_values').append(meta_group);
                        });
                    }
                } else {
                    alert('Error loading post details');
                }
            },
            error: function (xhr, status, error) {
                alert('An error occurred while fetching post details');
            }
        });

    });
    $('.btn-close').on('click', function () {
        $('#post_details_modal').modal('hide');
    });
});
