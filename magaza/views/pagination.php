<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item <?php echo ($current_page <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link"
                href="<?php echo generatePageLink(($current_page <= 1) ? 1 : ($current_page - 1), $_GET); ?>"
                aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        function generatePageLink($page, $queryParams)
        {
            $url = $_SERVER['PHP_SELF'] . '?page=' . $page;

            // Mevcut GET parametrelerini kontrol edin ve linklere ekleyin
            foreach ($queryParams as $key => $value) {
                if ($key !== 'page') {
                    $url .= '&' . $key . '=' . $value;
                }
            }

            return $url;
        }

        ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($current_page == $i) ? 'active' : ''; ?>">
                <a class="page-link" href="<?php echo generatePageLink($i, $_GET); ?>">
                    <?php echo $i; ?>
                </a>
            </li>
        <?php endfor; ?>

        <li class="page-item <?php echo ($current_page >= $totalPages) ? 'disabled' : ''; ?>">
            <a class="page-link"
                href="<?php echo generatePageLink(($current_page >= $totalPages) ? $totalPages : ($current_page + 1), $_GET); ?>"
                aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>