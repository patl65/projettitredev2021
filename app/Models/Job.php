<?php

namespace App\Models;

use Eloquent;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Job newModelQuery()
 * @method static Builder|Job newQuery()
 * @method static Builder|Job query()
 * @method static Builder|Job whereCreatedAt($value)
 * @method static Builder|Job whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Job extends Model
{
    use HasFactory, Notifiable;

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'title', 'slug', 'contract', 'job', 'visible', 'closed', 'user_id'
    ];

        //pour clé étrangère de User dans Post : 1 post a 1 seul créateur/modificateur/publicateur
        // public function user(): BelongsTo
        // {
        //     return $this->belongsTo(User::class);
        // }
        public function user()
        {
            return $this->belongsTo(User::class);
        }

}
