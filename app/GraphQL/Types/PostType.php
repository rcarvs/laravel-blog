<?php
namespace App\GraphQL\Types;

use App\Models\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Post',
        'description'=> 'A Post of blog',
        'model'=> Post::class,
    ];

    public function fields(): array
    {
        return [
            'slug' => [
                'type' => Type::string(),
                'description' => 'The title of post',
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'The title of post',
            ],
            'content' => [
                'type' => Type::string(),
                'description' => 'The content of post',
            ],
            'posted_at' => [
                'type' => Type::string(),
                'description' => 'The posted date of post',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'The created date of post',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'The updated date of post',
            ],
            'thumbnail_id' => [
                'type' => Type::int(),
                'description' => 'The thumbnail id of post',
            ],
        ];
    }
}
