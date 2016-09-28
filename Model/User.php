<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Tomas
 */

use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity @Table(name="users")
 **/

class User {
    
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $username;
    /** @Column(type="string") **/
    protected $email;
    /**
     * @OneToMany(targetEntity="Post", mappedBy="posts")
     */
    protected $posts;
    
    function __construct() {
        $this->posts = new ArrayCollection();
        
    }

    
    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function setUsername($username) {
        $this->username = $username;
    }
    
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getPosts() {
        return $this->posts;
    }

    function addPost($post){
        $this->posts[] = $post;
    }
    
    

}
