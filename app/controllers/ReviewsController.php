<?php


namespace App\controllers;

use App\DB\Review;
use App\rules\ReviewRules;

class ReviewsController extends Controller
{
    public function all(Review $review)
    {
        try {
            $reviews = $review->all();
            echo $this->templates->render('view_reviews', compact('reviews'));
        } catch (\Exception $exception) {
            echo $this->templates->render('view_error', [
                'code' => 'Oops!!!',
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function add(Review $review, ReviewRules $rules)
    {
        $rules->validate();
        try {
            $id = $review->add($_POST);
            if ($photos = upload_images('photos', get_const('url.img'))) {
                $review->addPhotos($photos, $id);
            }
        } catch (\Exception $exception) {
            header('HTTP/1.1 503 Service Unavailable');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($exception->getMessage(), JSON_UNESCAPED_SLASHES);
            exit();
        }
        header('Content-type: application/json');
        echo json_encode([
            'photos' => $photos,
        ]);
    }
}