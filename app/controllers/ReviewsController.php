<?php


namespace App\controllers;

use App\DB\Review;

class ReviewsController extends Controller
{
    public function all(Review $review)
    {
        $reviews = $review->getAllReviews();
        echo $this->templates->render('view_reviews', compact('reviews'));
    }

    public function add(Review $review)
    {
        if ($this->rules->validateOnAdd()) {
            $id = $review->addReviewData($_POST);
            $photos = [];
            if (!empty($_FILES['photos']['name'][0])) {
                $photos = upload_images($_FILES['photos'], get_const('url.img'));
                $review->addReviewPhotos($photos, $id);
            }
            header('Content-type: application/json');
            echo json_encode([
                'photos' => $photos,
            ]);
        } else {
            $errors = $this->rules->getValidationErrors();
            header('HTTP/1.1 422 Unprocessable Entity');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($errors, JSON_UNESCAPED_SLASHES);
        }
    }
}