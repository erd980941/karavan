<?php include __DIR__ . '/../business/k-category.response.php' ?>
<li class="dropdown"><a href="#"><span>Tiny House</span> <i class="bi bi-chevron-down"></i></a>
    <ul>
        <?php foreach ($categoriesTypeTinyHouse as $item): ?>
            <li><a href="<?= base_url ?>/<?php echo $item['category_type'] ?>/<?php echo $item['category_url'] ?>">
                    <?php echo $item['category_name'] ?>
                </a></li>
        <?php endforeach; ?>
    </ul>
</li>
<li class="dropdown"><a href="#"><span>Tiny Ticari</span> <i class="bi bi-chevron-down"></i></a>
    <ul>
        <?php foreach ($categoriesTypeTinyTicari as $item): ?>
            <li><a href="<?= base_url ?>/<?php echo $item['category_type'] ?>/<?php echo $item['category_url'] ?>">
                    <?php echo $item['category_name'] ?>
                </a></li>
        <?php endforeach; ?>
    </ul>
</li>
<li class="dropdown"><a href="#"><span>Karavan</span> <i class="bi bi-chevron-down"></i></a>
    <ul>
        <?php foreach ($categoriesTypeKaravan as $item): ?>
            <li><a href="<?= base_url ?>/<?php echo $item['category_type'] ?>/<?php echo $item['category_url'] ?>">
                    <?php echo $item['category_name'] ?>
                </a></li>
        <?php endforeach; ?>
    </ul>
</li>
<li class="dropdown"><a href="#"><span>Römork</span> <i class="bi bi-chevron-down"></i></a>
    <ul>
        <?php foreach ($categoriesTypeRomork as $item): ?>
            <li><a href="<?= base_url ?>/<?php echo $item['category_type'] ?>/<?php echo $item['category_url'] ?>">
                    <?php echo $item['category_name'] ?>
                </a></li>
        <?php endforeach; ?>
    </ul>
</li>
<li class="dropdown"><a href="#"><span>Marin</span> <i class="bi bi-chevron-down"></i></a>
    <ul>
        <?php foreach ($categoriesTypeMarin as $item): ?>
            <li><a href="<?= base_url ?>/<?php echo $item['category_type'] ?>/<?php echo $item['category_url'] ?>">
                    <?php echo $item['category_name'] ?>
                </a></li>
        <?php endforeach; ?>
    </ul>
</li>