<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Collection;

// class ReviewCollection extends Collection
// {
//     /**
//      * Thread the comment tree.
//      *
//      * @return $this
//      */
//     public function threaded()
//     {
//         $reviews = parent::groupBy('parent_id');

//         if (count($reviews)) {
//             $reviews['root'] = $reviews[''];
//             unset($reviews['']);
//         }

//         return $reviews;
//     }
// }
