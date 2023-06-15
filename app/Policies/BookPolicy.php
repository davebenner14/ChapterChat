<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        // You can modify this if there are any conditions to view any book
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Book $book)
    {
        // Only allow the user to view the book if they are a member of the book's team
        return $user->currentTeam->id === $book->team_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        // You can modify this if there are any conditions to create a book
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Book $book)
    {
        // Allow the user to update the book if they created it or if they are the team admin
        return $user->id === $book->user_id || $user->currentTeam->id === $book->team_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Book $book)
    {
        // Allow the user to delete the book if they created it or if they are the team admin
        return $user->id === $book->user_id || $user->currentTeam->id === $book->team_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Book $book)
    {
        // Allow the user to restore the book if they created it or if they are the team admin
        return $user->id === $book->user_id || $user->currentTeam->id === $book->team_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Book $book)
    {
        // Allow the user to force delete the book if they created it or if they are the team admin
        return $user->id === $book->user_id || $user->currentTeam->id === $book->team_id;
    }
}