<?php
session_start();
require "DBBlackbox.php";
require "Author.php";

$messages = []; //empty messages for session

if (!empty($_SESSION['flashed_messages'])) {
    $messages = $_SESSION['flashed_messages'];
    unset($_SESSION['flashed_messages']);
};


$id = $_GET["id"] ?? null;   //id can be empty

//chosen which one create or edit ---- condition related with ID

if ($id) {
    //edit existing record
    $artist = find($id, "Author"); //has to be find id from whose Objects
} else {
    //create new record
    $artist = new Author;

};
?>

<?php foreach ($messages as $type => $messages_of_type) : ?>
    <?php foreach ($messages_of_type as $message) : ?>
        <div class="message message_<?= $type ?>">
            <?= $message ?>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>

<?php if ($id) : //adds the id to url or not if there isnt - id catches landing page ?> 
    <form action="save.php?id=<?=$id?>" method="post">
<?php else : ?>
    <form action="save.php" method="post">
<?php endif ?>  

First Naem:
<input type="text" name="fname" value="<?=$artist->first_name?>"> 
Last Name:
<input type="text" name="lname" value="<?=$artist->last_name?>">
BIO:
<textarea name="biography" id="" cols="30" rows="10" autofocus><?=$artist->biography?></textarea>
IMG:
<input type="text" name="image" value="<?=$artist->image?>"> 


<button>SAVE</button>

</form>