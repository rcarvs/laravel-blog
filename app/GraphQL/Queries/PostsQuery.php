<?php
namespace App\GraphQL\Queries;

use Closure;
use App\Models\Post;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;


class PostsQuery extends Query{

    protected $attributes = [
        'name' => 'Posts query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('post'));
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'slug' => ['name' => 'slug', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        if (isset($args['id'])) {
            return Post::where('id' , $args['id'])->get();
        }

        if (isset($args['slug'])) {
            return Post::where('slug', $args['email'])->get();
        }

        /*
         * CREATE PAGINATION WITH LIMIT AND LAST
         */

        return Post::all();
    }

}
