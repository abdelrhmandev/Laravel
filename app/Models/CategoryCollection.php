<?php


// https://stackoverflow.com/questions/75176579/laravel-recursive-query-with-eloquent

// https://github.com/etrepat/baum



namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class CategoryCollection extends Collection
{
    /**
     * Thread the comment tree.
     *
     * @return $this
     */
    public function threaded()
    {
        $categories = parent::groupBy('parent_id');

        if (count($categories)) {
            $categories['root'] = $categories[''];
            unset($categories['']);
        }

        return $categories;
    }
}
