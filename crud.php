<?php
include_once 'db.php';

if(isset($_POST['save']))
{
    $idcode = $MySQLiconn->real_escape_string($_POST['idcode']);
    $title = $MySQLiconn->real_escape_string($_POST['title']);
    $author = $MySQLiconn->real_escape_string($_POST['author']);
    $year = $MySQLiconn->real_escape_string($_POST['year']);
    $speciality = $MySQLiconn->real_escape_string($_POST['speciality']);
    $editorial = $MySQLiconn->real_escape_string($_POST['editorial']);
    $isbn = $MySQLiconn->real_escape_string($_POST['isbn']);
    $url = $MySQLiconn->real_escape_string($_POST['url']);

    $SQL = $MySQLiconn->query("INSERT INTO biblioteca(idcode, title, author, year, speciality, editorial, isbn, url) VALUES('$idcode', '$title', '$author', '$year', '$speciality', '$editorial', '$isbn', '$url')");

    if (!$SQL)
    {
        echo $MySQLiconn->error;
    }
}

if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM biblioteca WHERE idcode=".$_GET['del']);
    header("Location: index.php");
}

if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->query("SELECT * FROM biblioteca WHERE idcode =".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE biblioteca SET idcode='".$_POST['idcode']."', title='".$_POST['title']."', author='".$_POST['author']."', year='".$_POST['year']."', speciality='".$_POST['speciality']."', editorial='".$_POST['editorial']."', isbn='".$_POST['isbn']."', url='".$_POST['url']."' 
            WHERE idcode=".$_GET['edit']);
    header("Location: index.php");
}