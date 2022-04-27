<?php


namespace App\controllers;

use App\DB\Review;
use App\rules\ReviewRules;

class ReviewsController extends Controller
{
    public function all(Review $review)
    {
        $reviews = $review->all();
        echo $this->templates->render('view_reviews', compact('reviews'));
    }

    public function add(Review $review, ReviewRules $rules)
    {
        $rules->validate();
        $id = $review->add($_POST);
        $photos = [];
//        if (!empty($_FILES['photos']['name'][0])) {
        if (!empty($_FILES)) {
            $photos = upload_images($_FILES['photos'], get_const('url.img'));
            $review->addPhotos($photos, $id);
        }
        header('Content-type: application/json');
        echo json_encode([
            'photos' => $photos,
        ]);
    }
}