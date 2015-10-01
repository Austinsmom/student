<?php namespace App\Observers;

class CommentObserver
{

    public function saved($comment)
    {
        $this->addComment($comment);
    }

    public function deleted($comment)
    {
        $this->restoreNumberComment($comment);
    }

    protected function restoreNumberComment($comment)
    {
        $comment->post->comments_count = $comment->post->comments->count();
        $comment->post->save();
    }

    protected function addComment($comment)
    {
        $comment->post->comments_count++;
        $comment->post->save();
    }
}