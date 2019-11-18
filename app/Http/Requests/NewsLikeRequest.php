<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsLikeRequest extends FormRequest
{
    private $emotions = [
        'like',
        'funny',
        'amazing',
        'sad',
        'angry',
        'unlike',
    ];

    private $types = [
        'author-article',
        'news'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => ['required', 'string'],
            'plusEmotion' => ['required', 'string', Rule::in($this->emotions)],
            'type' => ['required', 'string', Rule::in($this->types)]
        ];
    }
}
