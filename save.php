<?php
session_start();

require "DBBlackbox.php";
require "Author.php";

//1 catch ID
$id = $_GET["id"] ?? null;

//2 choose what is it
if ($id) {
    //edit existing record
    $artist = find($id, "Author");
} else {
    //create new record
    $artist = new Author;

};

//3 set the values
$artist->first_name = $_POST["fname"] ?? $artist->first_name; //is there name in the POST? assign the name or default
$artist->last_name  = $_POST["lname"] ?? $artist->last_name;
$artist->biography  = $_POST["biography"] ?? $artist->biography;
$artist->image      = $_POST["image"] ?? $artist->image;


//4 send data to dtb
if ($id) {
    //update dtb if record does exists
    update($id, $artist);
}   else {
    //save if it is new
    $id = insert($artist);
}

// 5. shows flashed messages 

$_SESSION['flashed_messages']['success'][] ="Buja";


//6 PRG princip 
//redirect to the form where we can update it 
header("Location: edit.php?id=" . $id);

