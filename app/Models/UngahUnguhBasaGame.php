<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UngahUnguhBasaGame
 * 
 * @property int $id
 * @property int $ungah_unguh_basa_id
 * @property string $answer1
 * @property string $answer2
 * @property string $options
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property UngahUnguhBasa $ungah_unguh_basa
 *
 * @package App\Models
 */
class UngahUnguhBasaGame extends Model
{
	protected $table = 'ungah_unguh_basa_game';

	protected $casts = [
		'ungah_unguh_basa_id' => 'int'
	];

	protected $fillable = [
		'ungah_unguh_basa_id',
		'answer1',
		'answer2',
		'options'
	];

	public function ungah_unguh_basa()
	{
		return $this->belongsTo(UngahUnguhBasa::class);
	}
}
