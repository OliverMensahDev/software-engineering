<?php

class CommentsByUserTest
{
    private function map($data, $callback)
    {
        $result = [];

        foreach($data as $singleData){
            $result[] = $callback($singleData);
        }
        return $result;
    }

    private function filter($items, $callback)
    {
        $result = [];
        foreach($items as $item){
            if($callback($item)){
                $result[] = $item;
            }
        }
        return $result;
    }

    private function reduce($items, $callback, $initial)
    {
        $accumulator = $initial;
        foreach ($items as $item) {
            $accumulator = $callback($accumulator, $item);
        }
        return $accumulator;
    }


    public function test($user)
    {
        $posts = [
            [
                'title' => "Tips for Testing Emails in Laravel",
                'comments' => [
                    ['user' => 'Jane Smith', 'message' => "Very helpful!"],
                    ['user' => 'Bob Jones', 'message' => "Great post!"],
                    ['user' => 'Bob Jones', 'message' => "By the way, any tips for testing ElasticSearch?"],
                ],
            ],
            [
                'title' => "Testing ElasticSearch Queries",
                'comments' => [
                    ['user' => 'Bob Jones', 'message' => "Perfect, just what I needed!"],
                    ['user' => 'Kyle Johnson', 'message' => "You are seriously running ElasticSearch on your Mac and not a VM?"],
                    ['user' => 'Dana Smith', 'message' => "Would this work with Algolia?"],
                ],
            ],
            [
                'title' => "New Features in PHPUnit 5",
                'comments' => [
                    ['user' => 'Kyle Johnson', 'message' => "You should be using PHPSpec, you don't know what you're doing."],
                ],
            ],
            [
                'title' => "Using Factories to Clean up Your Tests",
                'comments' => [
                    ['user' => 'Dana Smith', 'message' => "When do you use factories instead of fixtures?"],
                    ['user' => 'Kyle Johnson', 'message' => "Your tests should never hit the database to begin with."],
                ],
            ],
            [
                'title' => "Refactoring Your Test Suite",
                'comments' => [
                    ['user' => 'Bob Jones', 'message' => "I had never thought to create my own assertions, awesome!"],
                    ['user' => 'Dana Smith', 'message' => "Never used spies before, very cool!"],
                ],
            ]
        ];

        $comments =  $this->reduce($posts, function($acc, $cur){
            return array_merge($cur['comments'], $acc);
        }, []);
        
        $commentsByUser = $this->filter($comments, function ($comment) use ($user) {
            return $comment['user'] == $user;
        });
        return count($commentsByUser);        
    }
}

$posts = new CommentsByUserTest();
echo $posts->test('Jane Smith');
echo $posts->test('Bob Jones');
echo $posts->test('Kyle Johnson');
echo $posts->test('Dana Smith');