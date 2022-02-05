<?php

namespace Mia\Help\Model;

use Mia\Category\Model\MiaCategory;
use Mia\Database\Model\MIALanguage;

/**
 * Description of Model
 * @property int $id ID of item
 * @property mixed $language_id Description for variable
 * @property mixed $category_id Description for variable
 * @property mixed $title Description for variable
 * @property mixed $content Description for variable
 * @property mixed $likes Description for variable
 * @property mixed $dislikes Description for variable
 * @property mixed $status Description for variable
 * @property mixed $created_at Description for variable
 * @property mixed $updated_at Description for variable
 * @property mixed $deleted Description for variable

 *
 * @OA\Schema()
 * @OA\Property(
 *  property="id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="language_id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="category_id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="title",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="content",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="likes",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="dislikes",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="status",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="created_at",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="updated_at",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="deleted",
 *  type="integer",
 *  description=""
 * )

 *
 * @author matiascamiletti
 */
class MiaHelp extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'mia_help';
    
    //protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //public $timestamps = false;

    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function category()
    {
        return $this->belongsTo(MiaCategory::class, 'category_id');
    }
    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function language()
    {
        return $this->belongsTo(MIALanguage::class, 'language_id');
    }


    /**
    * Configurar un filtro a todas las querys
    * @return void
    */
    protected static function boot(): void
    {
        parent::boot();
        
        static::addGlobalScope('exclude', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->where('mia_help.deleted', 0);
        });
    }
}