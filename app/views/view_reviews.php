<?php
$this->layout('view_head');
?>

<div class="container">
    <div class="col-md-12">
        <div class="bg-white rounded shadow-lg p-4 mb-4" >
            <div id="all_reviews">
                <?php foreach ($reviews as $review): ?>
                    <div class="review pb-4">
                        <div class="row">
                            <div class="col-md-1 p-0">
                                <div class="avatar">
                                    <img src="img/no_avatar.png" alt="..." class="img-thumbnail mr-3">
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="review-user mb-3">
                                    <div class="font-weight-bold ">
                                        <?php echo $review->nickname; ?>
                                    </div>
                                    <div>
                                        <?php echo $review->date; ?>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <h5 class="font-weight-bold">
                                        <?php echo $review->title; ?>
                                    </h5>
                                    <div class="text-justify">
                                        <p>
                                            <?php echo $review->review; ?>
                                        </p>
                                    </div>
                                    <div id="pros+cons">
                                        <?php if ($review->pros): ?>
                                            <div class="d-flex flex-row">
                                                <h4 class="font-weight-bold text-danger mr-2">
                                                    <i class="fas fa-plus"></i>
                                                </h4>
                                                <div class="text-justify">
                                                    <p>
                                                        <?php echo $review->pros; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($review->cons): ?>
                                            <div class="d-flex flex-row">
                                                <h4 class="font-weight-bold text-primary mr-2">
                                                    <i class="fas fa-minus"></i>
                                                </h4>
                                                <div class="text-justify">
                                                    <p>
                                                        <?php echo $review->cons; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($review->recommended): ?>
                                        <div class="recommended d-flex flex-row">
                                            <h4 class="text-success mr-2">
                                                <i class="fas fa-check"></i>
                                            </h4>
                                            <p>
                                                I would recommend this to a friend
                                            </p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if (count($review->ownPhotosList)): ?>
                                    <div class="review-photo">
                                        <div class="portfolio-item row">
                                            <?php foreach ($review->ownPhotosList as $photo): ?>
                                                <div class="item col-md-2">
                                                    <a href="<?php echo get_review_image($photo->photo); ?>" class="fancylight popup-btn" data-fancybox-group="light">
                                                        <img class="img-thumbnail" src="<?php echo get_review_image($photo->photo); ?>" alt="">
                                                    </a>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
            <div class="text-right">
                <button type="button" id="addReview" class="btn btn-primary " data-toggle="modal" data-target="#addReviewModalWindow">
                    <i class="fas fa-plus"></i>
                    Add review
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addReviewModalWindow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold " id="header">Write Your Own Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-message-info m-2">
            </div>
            <form id="reviewForm" class="was-validated" role="form">
<!--            <form id="reviewForm" role="form" enctype="multipart/form-data" novalidate>-->
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                        <div class="col-md-6">
                            <input type="text" id="title" class="form-control" name="title" required minlength="3">
                            <div class="invalid-feedback">
                                Title must be 3 characters minimum
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="review" class="col-md-4 col-form-label text-md-right">Review</label>
                        <div class="col-md-6">
                            <textarea id="review" class="form-control" name="review" rows="3" required minlength="10"></textarea>
                            <div class="invalid-feedback">
                                Review must be 10 characters minimum
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pros" class="col-md-4 col-form-label text-md-right">Pros</label>
                        <div class="col-md-6">
                            <textarea id="pros" class="form-control" name="pros" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cons" class="col-md-4 col-form-label text-md-right">Cons</label>
                        <div class="col-md-6">
                            <textarea id="cons" class="form-control" name="cons" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="recommended" class="col-md-4 col-form-check-label text-md-right">Recommended</label>
                        <div class="col-md-6">
                            <input type="hidden" id="recommendedHidden" name="recommended" value="0" class="form-input">
                            <input type="checkbox" id="recommended" name="recommended" value="1" class="form-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="photos" class="col-md-4 col-form-label text-md-right">Add photos</label>
                        <div class="col-md-6">
                            <input type="file" multiple id="photos" class="form-input" name="photos[]">
                        </div>
                    </div>

                    <h5 class="font-weight-bold">Tell us a little about yourself.</h5>

                    <div class="form-group row">
                        <label for="nickname" class="col-md-4 col-form-label text-md-right">Your nickname</label>
                        <div class="col-md-6">
                            <input type="text" id="nickname" class="form-control" name="nickname" required minlength="3">
                            <div class="invalid-feedback">
                                Nickname must be 3 characters minimum
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Your e-mail</label>
                        <div class="col-md-6">
                            <input type="email" id="email" class="form-control" name="email" required>
                            <div class="invalid-feedback">
                                Enter valid email address
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </button>
                    <button id="categorySubmitButton" type="submit" class="btn btn-success">
                        <i class="far fa-save" id="categoryButtonSubmit"></i>
                        Add
                        <span id="buttonValue"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
