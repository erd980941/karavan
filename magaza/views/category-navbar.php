
<?php
function hasChildrenForNav($categories, $parentId)
{
    foreach ($categories as $cat) {
        if ($cat['parent_id'] == $parentId) {
            return true;
        }
    }
    return false;
}

function generateCategoryMenu($categories, $parentId = null)
{
    echo '<ul>';
    echo $parentId==null?'<li><a href="urunler">Tüm Ürünler</a></li>':'';
    foreach ($categories as $cat) {
        if ($cat['parent_id'] == $parentId) {
            if (hasChildrenForNav($categories, $cat['category_id'])) {
                echo '<li class="dropdown" >';
                echo '<a href="urunler?category_id=' . $cat['category_id'] . '">';
                echo '<span>'.$cat['category_title'].'</span>';
                echo '<i class="bi bi-chevron-right"></i>';
                echo '</a>';
                    generateCategoryMenu($categories, $cat['category_id']); 
                echo '</li>';
            } else {
                echo '<li>';
                echo '<a href="urunler?category_id=' . $cat['category_id'] . '">';
                echo '<span>'.$cat['category_title'].'</span>';
                echo '</a>';
                    generateCategoryMenu($categories, $cat['category_id']); 
                echo '</li>';
            }
            
        }
    }
    echo '</ul>';
}
generateCategoryMenu($categoriesNav);
?>