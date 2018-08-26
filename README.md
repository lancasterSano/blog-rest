# Blog Rest
Rest api for creating blog posts, getting them as well as deleting and updating them.

## Pre-requisites
- composer is set up globally
- php is also installed

## Deploying to local environment
1. Install vendor stuff `composer install`
2. Create .env file from .env.example `@php -r "file_exists('.env') || copy('.env.example', '.env');"`
3. Then set up Homestead `php vendor/bin/homestead make`
4. Set up and boot virtual machine `vagrant up`
5. Now go inside vagrant machine `vagrant ssh`
6. Create db tables with migration command (inside vagrant!) `php code/artisan migrate`
7. Then populate categories table with some data `php code/artisan db:seed` (also inside vagrant!)
8. Done, you can now see the list of categories `GET /api/categories` and query another endpoints

## Supported endpoints

`GET /api/categories`

`GET /api/posts`

`POST /api/posts` - supports JSON payload

`PUT /api/posts/{id}` - supports JSON payload

`GET /api/posts/{id}`

`DELETE /api/posts/{id}`

## Create and update payload example
```
{
    "title": "The coolest post",
    "body": "lorem ipsum...",
    "category_id": 1
}
```

## Unit testing
Just run `composer test`
