<?php 

include("view/header.php"); 
?>

<ul class="flg-flex-2" style="position: fixed;">

<li class="item-5">

    <!-- <h1>Categories</h1> -->

    </li>

    <li class="item-6">

    <button type="button" onclick="location.href = '.?action=list_todoitems'" class="header-input button-W" style="color: red;">HOME</button>

    </li>

</ul>

<div id="list-wrapper">

<!------    DISPLAY CATEGORIES -->

<?php if (!empty($categories)) : ?> 
    <section>

            <div id="list-items-wrap">
      
       <!--   FOR EACH BEGIN -->     
        <?php foreach ($categories as $category) : ?>

            <ul class="flg-flex">
           
            <li class="item-4">
               
              
            <span style="font-style: italic;">Category Name:</span> <span class="Title"> <?php echo htmlspecialchars($category['categoryName']) ?></span>

            </li>
            <li class="item-3">
             
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_category">

                        <input type="hidden" name="category_id" value="<?php echo $category['categoryID'] ?>">
                        
                        <button class="delete-cat"><span class="material-symbols-outlined">delete</span></button>
                    </form>

            </li>
         

        </ul>

        <?php endforeach; ?>

        </div>

    </section>

<?php else : ?>

    <p>No categories.</p>

<?php endif; ?>

</div>

<!--------- ADD CATEGORY -->

<section>

    <form id="Add_itemForm" action="." method="post">

    <ul class="flg-flex" style="border: none; margin-top:25px; padding-top: 0 !important;">

    <li class="item-4">

        <input type="hidden" name="action" value="add_category">
     
            <label>Name:</label>
       
             <input class="add_input" type="text" name="category_name" maxlength="30" placeholder="Name" autofocus required>


        </li>
        <li class="item-3">

<button class="add_button" type="submit"><strong>Add <br/>Category</strong></button><br>

</li>

    </ul>
    </form>
</section>


<!-- <a href=".?action=list_todoitems">HOME</a> -->

<?php 

include("view/footer.php"); 

?>
