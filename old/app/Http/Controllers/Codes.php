<?php
// https://www.larashout.com/update-model-status-using-toggles-in-laravel
/*
$books = DB::table('books')
            ->whereNot(function ($query) {
                $query->where('rating', '>', 2)
                    ->where('author', 'Ruskin Bond')
            })
            ->get();
-----------------------------------------------------------
$query = Author::query();

$query->when(request('filter_by') == 'likes', function ($q) {
    return $q->where('likes', '>', request('likes_amount', 0));
});
$query->when(request('filter_by') == 'date', function ($q) {
    return $q->orderBy('created_at', request('ordering_rule', 'desc'));
});

$authors = $query->get();
---------------

class ActiveCustomersController extends Controller
{
    public function __invoke()
    {
        return Customer::where('active', 1)->get();
    }
}
------------------------
\App\User::whereNameAndEmail('developer','developer@droptica.pl')->first();
---------------------------------------------
Model:
public function scopeActive($query) {
    return $query->where('active', 1);
}

public function scopeRegisteredWithinDays($query, $days) {
    return $query->where('created_at', '>=', now()->subDays($days));
}


Some Controller: 
$users = User::registeredWithinDays(30)->active()->get();


----------------------------
https://stackoverflow.com/questions/38686188/check-if-user-liked-post-laravel
class Post extends Model{
   public function likes(){
      return $this->hasMany(Like::class);
   }
   public function isAuthUserLikedPost(){
      return $this->likes()->where('user_id',  auth()->id())->exists();
   }
}*/