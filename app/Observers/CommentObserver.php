<?php namespace App\Observers;

class CommentObserver
{

    public function created($comment)
    {
        $this->addComment($comment);
    }

    public function deleted($comment)
    {
        $this->restoreNumberComment($comment);
    }

    protected function restoreNumberComment($comment)
    {
        $comment->post->comments_count = $comment->post->comments()->noSpam()->count();
        $comment->post->save();
    }

    protected function addComment($comment)
    {
        if ($comment->spam != 1) {
            $comment->post->comments_count++;
            $comment->post->save();
        }
    }
}