<?php

namespace Modules\Messenger\Traits;

use Modules\Messenger\Models\Thread;
use Modules\Messenger\Models\Participant;


trait UseMessengerTrait
{
    /**
     * Post relationship
     *
     * @return \Nova\Database\ORM\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('Modules\Messenger\Models\Post');
    }

    /**
     * Thread relationship
     *
     * @return \Nova\Database\ORM\Relations\belongsToMany
     */
    public function threads()
    {
        return $this->belongsToMany('Modules\Messenger\Models\Thread', 'participants');
    }

    /**
     * Returns the new Posts count for User
     *
     * @return int
     */
    public function newPostsCount()
    {
        $threads = $this->threadsWithNewPosts();

        return count($threads);
    }

    /**
     * Returns all Threads with new Posts
     *
     * @return array
     */
    public function threadsWithNewPosts()
    {
        $threadsWithNewPosts = array();

        $participants = Participant::where('user_id', $this->id)->lists('last_read', 'thread_id');

        if ($participants) {
            $threads = Thread::whereIn('id', array_keys($participants))->get();

            foreach ($threads as $thread) {
                if ($thread->updated_at > $participants[$thread->id]) {
                    $threadsWithNewPosts[] = $thread->id;
                }
            }
        }

        return $threadsWithNewPosts;
    }
}
