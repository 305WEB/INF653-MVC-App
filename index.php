<?php
require_once('model/database.php');
require_once('model/category_db.php');
require_once('model/todoItem_db.php');


$itemNum_id = filter_input(INPUT_POST, 'itemNum_id', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
$category_name = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_SPECIAL_CHARS);

// TRY TO GET category_id FROM POST, FALLS BACK TO GET IF NOT AVAILABLE
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

// DETERMIINE WHAT ACTION TO TAKE, DEFAULTS TO list_todoitems
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_todoitems';

switch ($action) {
    case "list_categories":

        $categories = get_categories();
        include('view/category_list.php');

        break; 
        
    case "add_category":

        if (!empty($category_name)) {
            
            add_category($category_name);
            header("Location: .?action=list_categories");
            exit(); 

        } else {

            $error = "Invalid category name.";

            include("view/error.php");
            exit(); 
        }
        break; 

    case "add_todoitem":

        if ($category_id && !empty($title) && !empty($description)) {

            add_todoitem($category_id, $title, $description);
            header("Location: .?action=list_todoitems&category_id=" . $category_id);
            exit(); 
            
        } else {
            
            $error = "Invalid todoitem data.";
            include("view/error.php");
            echo "<p class='error'>$error <a href='index.php'> << Home</a></p>";
            
            exit(); 
        }
        break; 

    case "delete_category":

        if ($category_id) {

            try {
                delete_category($category_id);
                header("Location: .?action=list_categories");
                exit(); 

            } catch (PDOException $e) {

                include('view/header.php'); 

                $error = "You cannot delete a category if todoitems with this category are present.";
                echo "<p class='error'>$error <a href='index.php'> << Home</a></p>";
               
                exit(); 
            }
        }
        break; 

    case "delete_todoitem":

        if ($itemNum_id) {

            delete_todoitem($itemNum_id);
            header("Location: .?action=list_todoitems&category_id=" . $category_id);
            exit(); 

        } else {

            $error = "Wrong or missing todoitem.";
            include('view/error.php');

            echo "<p class='error'>$error <a href='index.php'> << Home</a></p>";
            exit(); 
        }

        break; 

    default:

        $categories = get_categories();
        $todoitems = get_todoitems_by_category($category_id);
        include('view/todoitem_list.php');
       
        
}


