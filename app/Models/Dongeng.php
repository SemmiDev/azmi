<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dongeng
 * 
 * @property int $id
 * @property string $background
 * @property string $title
 * @property string $description
 * @property string $story
 * @property string $voice
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
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
}
