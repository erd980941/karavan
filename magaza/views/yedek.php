<?php include __DIR__.'/../business/category.response.php' ?>
<?php
function hasChildren($categories, $parentId)
{
    foreach ($categories as $cat) {
        if ($cat['parent_id'] == $parentId) {
            return true;
        }
    }
    return false;
}

function displayCategories($categories, $parentId = null)
{
    foreach ($categories as $cat) {
        if ($cat['parent_id'] == $parentId) {
            echo '<div>';
            echo '<button class="btn btn-primary my-2"  type="button" data-bs-toggle="collapse" data-bs-target="#collapse_' . $cat['category_id'] . '">';
            echo $cat['category_title'];
            echo '</button>';


            if (hasChildren($categories, $cat['category_id'])) {
                echo '<div class="collapse" id="collapse_' . $cat['category_id'] . '">';
                echo '<div class="card card-body">';

                // Recursive call for subcategories
                displayCategories($categories, $cat['category_id']);

                echo '</div>';
                echo '</div>';

            }
            echo '</div>';
        }
    }
}
displayCategories($categories); 
?>