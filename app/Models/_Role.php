<?php
namespace App\Models;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;
    // You might set a public property like guard_name or connection, or override other Eloquent Model methods/properties
}
 