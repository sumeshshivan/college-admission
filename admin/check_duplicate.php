<?php require_once("config.php"); ?>
<?php require_once("database.php"); ?>
<?php require_once("member.php"); ?>
<?php require_once("functions.php"); ?>

<?php
$q=$_GET["q"];
$found = Member::match($q);
if ($found)
{
    echo "<div class=\"alert alert-danger\">Duplicate Entry</div>";
}
else
{
    echo "<div class=\"alert alert-info\">No duplicate Entry</div>";
}
?>