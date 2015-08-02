<?php 
/**
 * Copyright 2015 Dirk Groenen 
 *
 * (c) Dirk Groenen <dirk@bitlabs.nl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DirkGroenen\Pinterest\Endpoints;

use DirkGroenen\Pinterest\Models\User;
use DirkGroenen\Pinterest\Models\Collection;

class Users extends Endpoint {
    
    /**
     * Get the current user
     * 
     * @access public
     * @param array     $data
     * @return Models\User
     */
    public function me( array $data = [] )
    {
        $user = $this->request->get("me", $data );
        return new User( $this->master, $user );
    }

    /**
     * Get the provided user
     * 
     * @access public
     * @param string    $username
     * @param array     $data
     * @return Models\User
     */
    public function find( $username, array $data = [] )
    {
        $user = $this->request->get( sprintf("users/%s", $username), $data );
        return new User( $this->master, $user );
    }

    /**
     * Get the authenticated user's pins
     * 
     * @access public
     * @param array     $data
     * @return Collection
     */
    public function getMePins( array $data = [] )
    {
        $pins = $this->request->get( "me/pins", $data );
        return new Collection( $this->master, $pins, "Pin" );
    }

    /**
     * Search in the user's pins
     * 
     * @param  string   $query
     * @return Collection
     */
    public function searchMePins( $query )
    {
        $pins = $this->request->get( "me/search/pins", array(
            "query" => $query
        ) );
        return new Collection( $this->master, $pins, "Pin" );   
    }

    /**
     * Search in the user's boards
     * 
     * @param  string   $query
     * @return Collection
     */
    public function searchMeBoards( $query )
    {
        $boards = $this->request->get( "me/search/boards", array(
            "query" => $query
        ) );
        return new Collection( $this->master, $boards, "Board" );   
    }

    /**
     * Get the authenticated user's boards
     * 
     * @access public
     * @param array     $data
     * @return Collection
     */
    public function getMeBoards( array $data = [] )
    {
        $boards = $this->request->get( "me/boards", $data );
        return new Collection( $this->master, $boards, "Board" );
    }

    /**
     * Get the authenticated user's likes
     * 
     * @access public
     * @param array     $data
     * @return Collection
     */
    public function getMeLikes( array $data = [] )
    {
        $likes = $this->request->get( "me/likes", $data );
        return new Collection( $this->master, $likes, "Pin" );
    }

    /**
     * Get the authenticated user's following users
     * 
     * @access public
     * @param array     $data
     * @return Collection
     */
    public function getMeFollowingUsers( array $data = [] )
    {
        $users = $this->request->get( "me/following/users", $data );
        return new Collection( $this->master, $users, "User" );
    }

    /**
     * Get the authenticated user's following boards
     * 
     * @access public
     * @param array     $data
     * @return Collection
     */
    public function getMeFollowingBoards( array $data = [] )
    {
        $boards = $this->request->get( "me/following/boards", $data );
        return new Collection( $this->master, $boards, "Board" );
    }

    /**
     * Get the authenticated user's following interest
     * 
     * @access public
     * @param array     $data
     * @return Collection
     */
    public function getMeFollowingInterest( array $data = [] )
    {
        $interest = $this->request->get( "me/following/interest", $data );
        return new Collection( $this->master, $interest, "Model" );
    }

}