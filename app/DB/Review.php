<?php


namespace App\DB;

use RedBeanPHP\R;

class Review extends Model
{
    private $table = 'reviews';

    public function all()
    {
        return R::findAll($this->table);
    }

    public function add($data)
    {
        $review = R::dispense($this->table);
        $review->title = $data['title'];
        $review->nickname = $data['nickname'];
        $review->email = $data['email'];
        $review->date = date('F d,Y');
        $review->review = $data['review'];
        $review->pros = $data['pros'];
        $review->cons = $data['cons'];
        $review->recommended = $data['recommended'];
        return R::store($review);
    }

    public function addPhotos($data, $reviewId)
    {
        $review = R::load($this->table, $reviewId);
        foreach ($data as $item) {
            $photo = R::dispense('photos');
            $photo->photo = $item;
            $review->ownPhotosList[] = $photo;
            R::store($review);
        }
    }
}