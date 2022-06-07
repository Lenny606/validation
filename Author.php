<?php
class Author
{
    public $first_name = null;
    public $last_name = null;
    public $aliases = [];
    public $biography = null;
    public $image = null;
    public $date_of_date = null;
    public $genre = null;
    public $tracks = [];

    public function __construct($first_name = null, $last_name = null)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
    // adds a track among the tracks of the author
    // public function addTrack($track)
    // {
    //     $this->tracks[] = $track; 
    //     //or array_push($this->tracks, $track)
    // }

    public function setBio($biography)
    {
        $this->biography = $biography;   
    }

    public function getBioLength()
    {
        return strlen($this->biography);
    }

    // public function getFullName() {
    //     return 
    // }

    public function addTrack(Track $track)
    {
        $this->tracks[] = $track;
    }
}
