<?php 
include('view/header.php'); 
?>

<!-- DISPLAY TODO ITEMS -->
   
    <!-- FILIER TODO ITEMS BY CATEGORY -->

    <ul class="flg-flex-2" style="position: fixed;">

    <li class="item-5">

        <!-- <h1>To Do List</h1> -->

        </li>

    <li class="item-6">

    <form action="." method="get">

    <button class="header-input button-W" type="submit" style="color: red;">View</button>

        <select class="header-input button-W" name="category_id">

            <option value="0">All Categories</option>

        <!-- BEGIN FOR EACH -->
            <?php foreach ($categories as $category) : ?>

                <option value="<?php echo $category['categoryID'] ?>" <?php echo $category_id == $category['categoryID'] ? 'selected' : '' ?>>

                    <?php echo htmlspecialchars($category['categoryName']) ?>

                </option>
            <?php endforeach; ?>
        </select>
        <button type="button" onclick="location.href = '.?action=list_categories'" class="header-input button-W" style="color: red;">Edit</button>
       
    </form>
            </li>

           
            <!-- <li class="item-3">

            <a href=".?action=list_categories" class="top-link">Edit Categories</a>

            </li> -->

            </ul>

    
     <!-- ---------------------------------------TO DO ITEM LIST -->

     <section>

    <div id="list-wrapper">

    <?php if (!empty($todoitems)) : ?>

        <div id="list-items-wrap">

         <!-- BEGIN FOR EACH -->
        <?php foreach ($todoitems as $todoitem) : ?>

            <ul class="flg-flex" style="border-bottom: 1px solid gray;">

            <li class="item-4">

                <span class="Title"><?php echo htmlspecialchars($todoitem['Title']) ?></span>
                <span class="Description">Category: <?php echo htmlspecialchars($todoitem['categoryName']) ?></span>
             
                <span class="Description"><?php echo htmlspecialchars($todoitem['Description']) ?></span>

             </li>

                  <!-- DELETE ITEM -->
            <li class="item-3">
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_todoitem">
                    <input type="hidden" name="itemNum_id" value="<?php echo $todoitem['itemNum'] ?>">

                    <button type="submit" class="delete"><span class="material-symbols-outlined">delete</span></button>
                </form>

        </li>
          

        </ul>
        <?php endforeach; ?>
    <?php else : ?>
        
         <!-- IF NO CATEGORIES-->

        <p>No todoitems exist<?php echo $category_id ? ' for this category' : '' ?>.</p>
    <?php endif; ?>

    </div>

    </div>

</section>

<!-- ADD TO DO ITEM--- -->

<section>

    <!-- ADD TODO ITEM -->
    <form id="Add_itemForm" action="." method="post">

    <ul class="flg-flex" style="border: none; margin-top:25px; padding-top: 0 !important;">

    <li class="item-4">

        <select  class="add_input" name="category_id" required>

            <option value="">Category</option>

              <!-- BEGIN FOR EACH -->
            <?php foreach ($categories as $category) : ?>
               
                <option value="<?php echo $category['categoryID'] ?>">
                    <?php echo htmlspecialchars($category['categoryName']); ?>
                </option>

            <?php endforeach; ?>
        </select>
    
        <input class="add_input-2" type="text" name="title" maxlength="30" placeholder="Title" required>
        
        <input class="add_input-2" type="text" name="description" maxlength="50" placeholder="Description" required>
        
        </li>
        
        <li class="item-3">
        <button class="add_button" type="submit" name="action" value="add_todoitem"><strong>Add <br/>Item</strong></button> 
             
        </li>

</ul>
    
    </form>
</section>


<?php 
include('view/footer.php'); 
?>
