<?= view('layout/_header') ?>
<?= view('layout/_nav') ?>

<div class="hero-wrap js-fullheight" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="js-fullheight d-flex justify-content-center align-items-center">
					<div class="col-md-8 text text-center">
						

<?php
$imagePath = "/assets/images/avatar/".session()->get('foto');
$defaultImage = "/assets/images/avatar/default.jpg";


if (!empty(session()->get('foto')) && file_exists(PUBLIC_PATH.$imagePath)) {
    // Use the actual image if it exists
    $imageUrl = $imagePath;
} else {
    // Use the default image if the actual image does not exist
    $imageUrl = $defaultImage;
}
?>
<div class="img mb-4" style="background-image: url('<?php echo $imageUrl; ?>');"></div>
						<div class="desc">
							<h2 class="subheading">Hello </h2>
							<h1 class="mb-4"><?= session()->get('nama')?></h1>
							
						</div>
					</div>
				</div>
			</div>
			<section class="ftco-section">
    	<div class="container">
		
        <div class="row">
            <a><button  class="btn btn-success py-3 px-5" style="cursor: pointer;" data-toggle="modal" data-target="#upload_image">Add Gallery</button></a>
        </div>
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 heading-section  ftco-animate">
                <h2 class="mb-4 text-center">Recent Gallery</h2>
            </div>
        </div>
<div class="row">
    <?php foreach ($data as $gallery){ ?>
    			<div class="col-md-4">
    				<div class="blog-entry ftco-animate">
							<a href="#" class="img img-2" style="background-image: url(images/gallery/<?= $gallery->image?>);"></a>
							<div class="text text-2 pt-2 mt-3">
								<span class="category mb-3 d-block"><a href="#"><?= $gallery->nama_user?> - <?= $gallery->album?></a></span>
	              <h3 class="mb-4"><a href="#"><?= $gallery->nama_image?></a></h3>
	              <p class="mb-4"><?= $gallery->deskripsi_image?></p>
	              <div class="author mb-4 d-flex align-items-center">
                    <?php
                    $imagePath = "/assets/images/avatar/".$gallery->foto;
                    $defaultImage = "/assets/images/avatar/default.jpg";
                  if (!empty($gallery->foto) && file_exists(PUBLIC_PATH.$imagePath)) {
                        // Use the actual image if it exists
                        $imageUrl = $imagePath;
                    } else {
                        // Use the default image if the actual image does not exist
                        $imageUrl = $defaultImage;
                    }
                    ?>

	            		<a href="#" class="img" style="background-image: url(<?= $imageUrl?>);"></a>
	            		<div class="ml-3 info">
	            			<span>Gallery by</span>
	            			<h3><a href="#"><?= $gallery->nama_user?></a>, <span><?= $gallery->datetime?></span></h3>
	            		</div>
	            	</div>
	              <div class="meta-wrap align-items-center">
	              	<div class="half order-md-last">
		              	<p class="meta">
                        <!-- Repeat this structure for each item -->
<div class="item" data-id="<?= $gallery->IDimage?>">
  <a title="Like" href="#" class="btn like-button"><span><i class="icon-heart"></i></span></a>
  <a title="Comments" href="#" class="btn comment-button"><span><i class="icon-comment"></i></span></a>
  <?php if($gallery->user_id = session()->get('id_user')) { ?>
  <a title="Delete" href="#" class="btn delete-button"><span><i class="icon-trash"></i></span></a>
  <?php } ?>
</div>

		              	</p>
	              	</div>
	              	
	              </div>
	            </div>
						</div>
    			</div>
                <?php } ?>

                <!-- Add Gallery Button -->

<!-- Upload Image Modal -->
        <div class="modal fade" id="upload_image" tabindex="-1" aria-labelledby="uploadImageLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadImageLabel">Upload Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Image Upload Form -->
                        <form id="imageUploadForm" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="pictureTitle">Picture File</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="form-group">
                                <label for="pictureTitle">Picture Title</label>
                                <input type="text" class="form-control" id="pictureTitle" name="pictureTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="album">Album</label>
                                <select class="form-control" id="album" name="album" required>
                                    <!-- Albums will be dynamically loaded here by JavaScript -->
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="commentModalLabel">Comments</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Comments will be loaded here dynamically -->
                                <div id="comments-container">
                                    <!-- Comments will be dynamically loaded here -->
                                </div>

                                <!-- Input field for adding comments -->
                                <div class="form-group">
                                    <label for="commentInput">Add Comment:</label>
                                    <input type="text" class="form-control" id="commentInput" placeholder="Type your comment here">
                                </div>

                                <button type="button" class="btn btn-primary" id="submitComment">Submit Comment</button>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- Your scripts go here, including the Bootstrap, jQuery, and your custom JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        // Your custom JavaScript code for handling like and comment functionality
        $(document).ready(function() {
            // ... your existing JavaScript code ...

            // Example: Submit Comment Button Click
            
        });
    </script>
                
<script>
  $(document).ready(function() {
    $('#upload_image').on('show.bs.modal', function () {
            // Fetch albums via AJAX and populate the dropdown
            $.ajax({
                url: '/home/fetch_albums', // Update the URL to your controller method
                method: 'GET',
                success: function (response) {
                    // Update the dropdown with fetched albums
                    var albumDropdown = $('#album');
                    albumDropdown.empty(); // Clear existing options
                    $.each(response.albums, function (index, album) {
                        albumDropdown.append($('<option>', {
                            value: album.IDalbum,
                            text: album.album
                        }));
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching albums:', error);
                    // Handle the error, show a message, etc.
                }
            });
        });

        // Event listener for form submission
        $('#imageUploadForm').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Collect form data
            var formData = new FormData(this);

            

            // Make an AJAX request to process the image upload
            $.ajax({
                url: '/home/add_gallery', // Update the URL to your controller method
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Handle success, for example, close the modal
                    $('#upload_image').modal('hide');
                    location.reload(true);
                    // You might want to refresh the gallery or do other actions
                },
                error: function (xhr, status, error) {
                    console.error('Error adding gallery:', error);
                    // Handle the error, show a message, etc.
                }
            });
        });
    
    
    function checkLikeStatus(postId) {
    $.ajax({
      url: '/home/check_like/' + postId,
      method: 'get',
      success: function(response) {
        // Check the status returned from the server (Y or N)
        if (response.status === 'Y') {
          // If liked, add the 'liked' class to the like button
          $('.like-button[data-id="' + postId + '"]').addClass('liked');
        }
        // You can handle 'N' status if needed
      },
      error: function() {
        console.error('Error checking like status');
      }
    });
  }

  // Iterate through each like button on the page and check its status
  $('.like-button').each(function() {
    var postId = $(this).closest('.item').data('id');
    checkLikeStatus(postId);
  });
});
  // Like Button Click
  $('.like-button').on('click', function(e) {
    e.preventDefault();
    var likeButton = $(this);
    var postId = likeButton.closest('.item').data('id');

    // Send AJAX request to handle the like functionality for a specific item
    $.ajax({
      url: '/home/like/' + postId,
      method: 'POST',
      success: function(response) {
        // Update the like count on the specific item
        var newLikeCount = parseInt(response.likeCount);
        likeButton.find('.like-count').text(newLikeCount);
      },
      error: function() {
        console.error('Error handling like request');
      }
    });
  });

  $('.delete-button').on('click', function(e) {
    e.preventDefault();
    var deletebutton = $(this);
    var postId = deletebutton.closest('.item').data('id');

    // Open a pop-up or modal for comments
    // Example using Bootstrap modal

    // Populate the modal with comments for the specific item using AJAX
    $.ajax({
      url: '/home/delete/' + postId,
      method: 'GET',
      success: function(response) {


        location.reload(true);
      },
      error: function() {
        console.error('Error fetching comments');
      }
    });
});

 

  // Comment Button Click
  $('.comment-button').on('click', function(e) {
    e.preventDefault();
    var commentButton = $(this);
    var postId = commentButton.closest('.item').data('id');

    // Open a pop-up or modal for comments
    // Example using Bootstrap modal
    $('#commentModal').modal('show');

    // Populate the modal with comments for the specific item using AJAX
    $.ajax({
      url: '/home/comments/' + postId,
      method: 'GET',
      success: function(response) {
        // Update the modal content with actual comments
        // You'll need to customize this based on your response data

        var commentsHtml = '';

        // Iterate through the comments received from the server
        response.comments.forEach(function(comment) {
          // Append HTML for each comment
          commentsHtml += `
            <div class="comment">
              <div class="comment-line">
                <span class="comment-author">${comment.nama_user}</span>
              </div>
              <div class="comment-line">
                <span class="comment-text">${comment.comment}</span>
              </div>
              <div class="comment-line">
                <span class="comment-datetime">${comment.time_comment}</span>
              </div>
              <hr class="comment-divider">
            </div>
          `;
        });

        // Set the generated HTML to the comments container
        $('#comments-container').html(commentsHtml);
      },
      error: function() {
        console.error('Error fetching comments');
      }
    });
});


$('#submitComment').on('click', function() {
                var postId = likeButton.closest('.item').data('id');
                var commentText = $('#commentInput').val();

                // Send AJAX request to handle adding a comment for a specific item
                $.ajax({
                    url: '/home/add-comment/' + postId,
                    method: 'POST',
                    data: { comment: commentText },
                    success: function(response) {
                        // Handle success (e.g., update the comments dynamically)
                        // You'll need to customize this based on your response data
                        $('#comments-container').append('<div>' + commentText + '</div>');
                        $('#commentInput').val(''); // Clear the input field
                    },
                    error: function() {
                        console.error('Error adding comment');
                    }
                });
            });


</script>



<?= view('layout/_footer') ?>