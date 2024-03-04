<?php

// ADD ITEMS

function add_todoitem($category_id, $title, $description) {

    global $db;

    $query = 'INSERT INTO todoitems ( categoryID, Title, Description ) VALUES (:category_id, :title, :description)';

    $statement = $db->prepare($query);

    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);

    $statement->execute();
    $statement->closeCursor();
}

// DELETE ITEMS

function delete_todoitem($itemNum_id) {

    global $db;

    $query = 'DELETE FROM todoitems WHERE itemNum = :itemNum_id';

    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum_id', $itemNum_id);

    $statement->execute();
    $statement->closeCursor();
}

// GET ITEMS BY CATEGORY

function get_todoitems_by_category($category_id) {
    global $db;

    if ($category_id) {

        $query = 'SELECT A.itemNum, A.Title, A.Description, B.categoryName From todoitems A
            LEFT JOIN categories B ON A.categoryID = B.categoryID
                WHERE A.categoryID = :categoryID ORDER BY A.itemNum';

    } else {

        $query = 'SELECT A.itemNum, A.Title, A.Description, B.categoryName From todoitems A
        LEFT JOIN categories B ON A.categoryID = B.categoryID ORDER BY B.categoryID';

    }

    $statement = $db->prepare($query);

    if ($category_id) {
        $statement->bindValue(':categoryID', $category_id);
    }

    $statement->execute();
    $todoitems = $statement->fetchAll();
    $statement->closeCursor();

    return $todoitems;
}

// GET TODO ITEM

function get_todoitem($itemNum_id)  {

    global $db;

    $query = 'SELECT * FROM todoitems WHERE itemNum = :itemNum_id';

    $statement = $db->prepare($query);

    if ($itemNum_id) {
        $statement->bindValue(':itemNum_id', $itemNum_id);
    }

    $statement->execute();
    $todoitem = $statement->fetchAll();
    $statement->closeCursor();

    return $todoitem;

}




