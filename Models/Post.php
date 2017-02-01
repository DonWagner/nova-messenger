<?php

namespace Modules\Messenger\Models;

use Nova\Database\ORM\Model;
use Nova\Support\Facades\Config;


class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = array('thread');

    /**
     * The attributes that can be set with Mass Assignment.
     *
     * @var array
     */
    protected $fillable = array('thread_id', 'user_id', 'body');

    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = array(
        'body' => 'required',
    );

    /**
     * Thread relationship
     *
     * @return \Nova\Database\ORM\Relations\BelongsTo
     */
    public function thread()
    {
        return $this->belongsTo('Modules\Messenger\Models\Thread');
    }

    /**
     * User relationship
     *
     * @return \Nova\Database\ORM\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Modules\Users\Models\User');
    }

    /**
     * Participants relationship
     *
     * @return \Nova\Database\ORM\Relations\HasMany
     */
    public function participants()
    {
        return $this->hasMany('Modules\Messenger\Models\Participant', 'thread_id', 'thread_id');
    }

    /**
     * Recipients of this post
     *
     * @return \Nova\Database\ORM\Relations\HasMany
     */
    public function recipients()
    {
        return $this->participants()->where('user_id', '!=', $this->user_id);
    }

}
