<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TembangDolananGame
 * 
 * @property int $id
 * @property int $tembang_dolanan_id
 * @property string $question
 * @property string $answer
 * @property string $options
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TembangDolanan $tembang_dolanan
 *
 * @package App\Models
 */
class TembangDolananGame extends Model
{
	protected $table = 'tembang_dolanan_game';

	protected $casts = [
		'tembang_dolanan_id' => 'int'
	];

	protected $fillable = [
		'tembang_dolanan_id',
		'question',
		'answer',
		'options'
	];

	public function tembang_dolanan()
	{
		return $this->belongsTo(TembangDolanan::class);
	}
}
