<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    // Semua user yang login boleh melihat daftar dan detail
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Post $post): bool
    {
        return true;
    }

    // Admin dan editor boleh membuat postingan
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    // Edit: admin boleh semua, lainnya hanya miliknya sendiri
    public function update(User $user, Post $post): bool
    {
        return $user->isAdmin() || $user->id === $post->user_id;
    }

    // Hapus: admin boleh semua, lainnya hanya miliknya sendiri
    public function delete(User $user, Post $post): bool
    {
        return $user->isAdmin() || $user->id === $post->user_id;
    }
}