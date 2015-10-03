<?php

use App\Post;
use App\Comment;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentObserverTest extends TestCase
{

    protected $post;

    /**
     * @before
     */
    public function runDatabaseMigrations()
    {
//        $this->artisan('migrate');

        $this->artisan('migrate', [
            '--path' => './tests/migrations',
        ]);

        $this->post = Post::create(['title' => 'foo', 'comments_count' => 0, 'content'=> '']);


        // laravel method TestCase
        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');
        });
    }

    /**
     * @test add one comment into a post and checked number of count comments with table posts
     */
    public function testAddOneComment()
    {

        Comment::create(['email' => 'tony@tony.fr', 'content' => 'hello', 'post_id' => $this->post->id, 'spam' => 0]);

        $this->assertEquals(1, $this->post->comments()->noSpam()->count());
    }

    /**
     * @test add multiples comments into a post and checked number of count comments with table posts
     */
    public function testAddMultipleComments()
    {

        foreach (range(1, 10) as $r) Comment::create(['email' => 'tony@tony.fr', 'content' => 'hello', 'post_id' => $this->post->id, 'spam' => 0]);

        $this->assertEquals(10, $this->post->comments()->noSpam()->count());
    }

    /**
     * @test add multiples comments clean and spam into a post and checked number of count comments with table posts
     */
    public function testAddMultipleCommentsWithSpam()
    {

        foreach (range(1, 10) as $r) Comment::create(['email' => 'tony@tony.fr', 'content' => 'hello', 'post_id' => $this->post->id, 'spam' => 0]);
        foreach (range(1, 10) as $r) Comment::create(['email' => 'tony@tony.fr', 'content' => 'hello', 'post_id' => $this->post->id, 'spam' => 1]);

        $this->assertEquals(10, $this->post->comments()->noSpam()->count());
    }

    /**
     * @test deleted comment attached post and checked a number of comment
     */
    public function testDeletedCommentAndCountNumber()
    {
        $comment = Comment::create(['email' => 'tony@tony.fr', 'content' => 'hello', 'post_id' => $this->post->id, 'spam' => 0]);

        $this->assertEquals(1, $this->post->comments()->noSpam()->count());

        $comment->delete();

        $this->assertEquals(0, $this->post->comments()->noSpam()->count());

    }

    /**
     * @test deleted all comments spam attached post and checked a number of comment
     */
    public function testDeletedAllCommentSpamAndCountNumber()
    {
        foreach (range(1, 10) as $r)
            Comment::create([
                    'email'   => 'tony@tony.fr',
                    'content' => 'hello',
                    'post_id' => $this->post->id,
                    'spam'    => 1]
            );

        $this->assertEquals(0, $this->post->comments()->noSpam()->count());
        $this->assertEquals(10, $this->post->comments()->count());

        $comments = Comment::where('post_id', '=', $this->post->id);

        $comments->delete();

        $this->assertEquals(0, $this->post->comments()->count());

    }

    /**
     * @test a last one to pleasure
     */
    public function testDeletedMultipleCommentsNoSpamCountNumber()
    {
        foreach (range(1, 10) as $r)
            Comment::create([
                    'email'   => 'tony@tony.fr',
                    'content' => 'hello',
                    'post_id' => $this->post->id,
                    'spam'    => 0]
            );

        $comments = Comment::where('post_id', '=', $this->post->id)->get();

        $count = 3;
        foreach ($comments as $comment) {
            if ($count > 0) $comment->delete(); else break;
            $count--;
        }
        $this->assertEquals(7, $this->post->comments()->noSpam()->count());

    }

}