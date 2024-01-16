<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TembangDolanan
 * 
 * @property int $id
 * @property string|null $background
 * @property string|null $title
 * @property string|null $description
 * @property string|null $lyric
 * @property string|null $video
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TembangDolanan extends Model
{
	protected $table = 'tembang_dolanan';

	protected $fillable = [
		'background',
		'title',
		'description',
		'lyric',
		'video'
	];
}
