<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DongengGame
 * 
 * @property int $id
 * @property int $dongeng_id
 * @property string $question
 * @property string $answer
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Dongeng $dongeng
 *
 * @package App\Models
 */
class DongengGame extends Model
{
	protected $table = 'dongeng_game';

	protected $casts = [
		'dongeng_id' => 'int'
	];

	protected $fillable = [
		'dongeng_id',
		'question',
		'answer'
	];

	public function dongeng()
	{
		return $this->belongsTo(Dongeng::class);
	}
}
