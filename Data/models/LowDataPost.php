<?php

/**
 * Class LowDataPost
 * A class that may be used for searching or low
 * data usages
 * It serializes less field comparing to the bigger one
 * Post.php
 */
include_once "utilities/Functions.php";

class LowDataPost implements JsonSerializable
{
    private $postTitle;
    private $postID;
    private $postImage;

    public function __construct($db_row)
    {

        $this->postID = $db_row['post_id'];
        $this->postTitle = utf8_encode($db_row['post_title']);
        $this->postImage = $db_row['post_image'];
    }

    public function getPostTitle()
    {
        return $this->postTitle;
    }

    public function getPostImage()
    {
        if (substr($this->postImage, 0, 4) !== "http") {
            return "ImageController.php?imageName=" . $this->postImage;
        }
        return $this->postImage;
    }

    public function getPostID()
    {
        return $this->postID;
    }


    public function jsonSerialize()
    {
        return
            [
                'postID' => $this->getPostID(),
                'postTitle' => $this->getPostTitle(),
                'postImage' => $this->getPostImage(),
            ];
    }
}