<?php


// https://stackoverflow.com/questions/75176579/laravel-recursive-query-with-eloquent

// https://github.com/etrepat/baum




namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class HierarchyCollector extends Collection


 {

    /**
     * @var Collection
     */
    protected $categories;

    public function __construct() {
        // All the categories, keyed by the id for easy access
        $this->categories = Category::all()->keyBy('id');
    }

    /**
     * Get the hierarchy list.
     * 
     * @return array
     */
    public static function getHierarchyList(): array
    {
        $static = new static();
        
        // The top level categories (have no parents)
        $topLevelCategories = $static->categories->filter(function ($category) {
            return $category->parent_id <= 0;
        });

        return $static->getList($topLevelCategories);
    }

    /**
     * This  function creates (by running recursively)
     * an array of categories, their hierarchy level
     * and any other relevant data needed
     *
     * @param Collection $categories
     * @param int        $level
     * @param array      $list
     * @return array
     */
    protected function getList($categories, &$level = 0, &$list = []) {
        foreach ($categories as $category) {
            $list[$category->id] = $this->getHierarchyData($category, $level);
            $childrenCategories = $this->getCategoryChildren($category->id);
            if (count($childrenCategories)) {
                $level++;
                $this->getList($childrenCategories, $level, $list);
                $level--;
            }
        }

        return $list;
    }

    /**
     * Creates (by running recursively) an array of categories
     * with their hierarchy level and any other
     * relevant data needed
     * 
     * @param Category $category
     * @param int      $level
     * @return array
     */
    protected function getHierarchyData($category, $level) {
        return [
            'id' => $category->id,
            'level' => $level,
            'option_name' => str_repeat('-', $level) . $category->id,
            'id' => $category->id,
        ];
    }

    /**
     * Gets a given category's id children
     *
     * @param $categoryId
     * @return Collection
     */
    protected function getCategoryChildren($categoryId) {
        return $this->categories->filter(function ($category) use ($categoryId) {
            return $category->parent_id == $categoryId;
        });
    }


}

