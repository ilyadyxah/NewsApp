<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string|null $image
 * @property int|null $status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $category_id
 * @property int|null $author_id
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'author_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function create($item, $request)
    {
            $item->title = $request->title;
            $item->content = $request->content;
            $item->category_id = $request->category;
            $item->author_id = Author::firstOrCreate(['name' => $request->author])->id;
            $item->save();
            return 'Новость сохранена';
    }

    public static function rulesCreate()
    {
        return [
            'title' => 'required|min:10|max:50|unique:news',
            'content' => 'max:1000| required',
            'category' => 'required|integer|exists:categories,id',
            'author' => 'required|min:5|max:50',
        ];
    }

    public static function rulesUpdate()
    {
        return [
            'title' => 'required|min:10|max:50',
            'content' => 'max:1000|required',
            'category' => 'required|integer|exists:categories,id',
            'author' => 'required|min:5|max:50',
        ];
    }
}
