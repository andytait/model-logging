<?php namespace Tait\ModelLogging;

use Eloquent;

class ModelLog extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'model_logs';

    /**
     * Fillable attributes for mass assignment
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'content_id',
        'content_type',
        'action',
        'description'
    ];

    /**
     * Define to relationship between model logs and users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User');
    }
}
