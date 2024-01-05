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
    echo '<ul class="list-group list-group-light">';
    foreach ($categories as $cat) {
        if ($cat['parent_id'] == $parentId) {
            echo '<li class="list-group-item p-2">';
            echo '<a href="urunler?category_id=' . $cat['category_id'] . '" class="">';
            echo '<span>' . $cat['category_title'] . '</span>';

            if (hasChildren($categories, $cat['category_id'])) {
                echo '<a href="#collapse_' . $cat['category_id'] . '" class="btn btn-primary btn-sm float-end" style="padding:0.1rem 0.7rem" data-bs-toggle="collapse">';               
                echo '<i class="fas fa-plus" data-open="false"></i>';
                echo '</a>';

                echo '<ul class="submenu collapse" id="collapse_' . $cat['category_id'] . '" data-category-id="' . $cat['category_id'] . '">';
                displayCategories($categories, $cat['category_id']); // Recursive call for subcategories
                echo '</ul>';
            } else {
                echo '<a href="#collapse_' . $cat['category_id'] . '" class="btn btn-primary btn-sm float-end" style="padding:0.1rem 0.7rem;display:none;" data-bs-toggle="collapse">';               
                echo '<i class="fas fa-plus" data-open="false"></i>';
                echo '</a>';
                // Eğer alt kategori yoksa, burada bir <ul> etiketi ekleyebilirsiniz.
                echo '<ul class="submenu collapse" id="collapse_' . $cat['category_id'] . '" data-category-id="' . $cat['category_id'] . '">';
                echo '</ul>'; // Alt kategori olmadığı için sadece <ul> etiketi ekleniyor.
            }
            
            echo '</a>'; // li'nin içindeki a etiketini kapat
            echo '</li>';
        }
    }
    echo '</ul>';
}
displayCategories($categories);
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const activeCategoryId = <?php echo isset($_GET['category_id']) ? $_GET['category_id'] : 'null'; ?>;
    const submenuLinks = document.querySelectorAll('.submenu');

    submenuLinks.forEach(function (link) {
        const categoryId = link.getAttribute('data-category-id');
        const parentCategories = getParentCategories(link);

        if (categoryId == activeCategoryId) {
            
            link.classList.add('show');

            parentCategories.forEach(function (parent) {
                parent.classList.add('show');
            });

            
        } else {
            link.classList.remove('show');
        }
    });
});

function getParentCategories(element) {
    const parents = [];
    let parent = element.parentElement;

    while (parent && parent.tagName !== 'NAV') {
        if (parent.tagName === 'UL') {
            parents.push(parent);
        }
        parent = parent.parentElement;
    }

    return parents;
}

</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglerLinks = document.querySelectorAll('.list-group-item > a[data-bs-toggle="collapse"]');

        togglerLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                const icon = this.querySelector('i');
                const isOpen = icon.getAttribute('data-open');
                
                if (isOpen === 'false') {
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                    icon.setAttribute('data-open', 'true');
                } else {
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                    icon.setAttribute('data-open', 'false');
                }
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
    const submenuLinks = document.querySelectorAll('.submenu');

    submenuLinks.forEach(function(link) {
        const isOpen = link.classList.contains('show');
        const icon = link.previousElementSibling.querySelector('i');

        if (isOpen) {
            icon.classList.remove('fa-plus');
            icon.classList.add('fa-minus');
            icon.setAttribute('data-open', 'true');
        } else {
            icon.classList.add('fa-plus');
            icon.classList.remove('fa-minus');
            icon.setAttribute('data-open', 'false');
        }
    });
});
</script>