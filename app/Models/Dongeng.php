<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dongeng
 * 
 * @property int $id
 * @property string|null $background
 * @property string|null $title
 * @property string|null $description
 * @property string|null $story
 * @property string|null $voice
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|DongengGame[] $dongeng_games
 *
 * @package App\Models
 */
class Dongeng extends Model
{
	protected $table = 'dongeng';

	protected $fillable = [
		'background',
		'title',
		'description',
		'story',
		'voice'
	];

	public function dongeng_games()
	{
		return $this->hasMany(DongengGame::class);
	}
}
