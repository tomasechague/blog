<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author Tomas
 */


/**
 * @Entity @Table(name="posts")
 **/
class Post {
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $title;
    /** @Column(type="string") **/
    protected $content;
    /** @Column(type="datetime") **/
    protected $createAt;
    
    /**
     * @ManyToOne(targetEntity="User", inversedBy="posts")
     **/
    protected $user;
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getContent() {
        return $this->content;
    }

    function getCreateAt() {
        return $this->createAt;
    }

    function getUser() {
        return $this->user;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setCreateAt($createAt) {
        $this->createAt = $createAt;
    }

    function setUser($user) {
        $this->user = $user;
    }


}
