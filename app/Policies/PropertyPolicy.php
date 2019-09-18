<?php

namespace App\Policies;

use App\User;
use App\Property;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
{
    use HandlesAuthorization;
    
    public function before(User $user)
    {
        if($user->user_type === 'admin')
        {
            return true;
        }
    }
    
    public function viewAny(User $user)
    {
        //
    }

    
    public function view(User $user, Property $property)
    {
        //
    }

    
    public function create(User $user)
    {
        
    }

    
    public function update(User $user, Property $property)
    {
        return $user->id === $property->user_id;
    }

   
    public function delete(User $user, Property $property)
    {
        return $user->id === $property->user_id;
        
    }

   
    public function restore(User $user, Property $property)
    {
        //
    }

  
    public function forceDelete(User $user, Property $property)
    {
        //
    }
}
