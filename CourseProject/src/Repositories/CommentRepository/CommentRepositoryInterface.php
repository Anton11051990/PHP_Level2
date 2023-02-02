<?php

namespace CourseProject\LevelTwo\Repositories\CommentRepository;

use CourseProject\LevelTwo\Blog\Comment\Comment;
use CourseProject\LevelTwo\Common\UUID;

interface CommentRepositoryInterface
{
    public function save(Comment $comment):void;
    public function get(UUID $idComment):Comment;
    public function getByAuthor(UUID $idAuthor): Comment;
    public function getByPost(UUID $idPost): Comment;
}