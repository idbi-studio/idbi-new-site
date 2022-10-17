<?php
/**
 * @var $page
 * @var $pageCount
 */

?>
<ul class="pagination show-flex flex-end">
    <?php if ($page !== 1) { ?>
        <li class="pagination-item">
            <a href="/blogs/blog/?page=<?= $page - 1 ?>" class="pagination-link" title="Предыдущая">
                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            </a>
        </li>
    <?php } ?>
    <?php $skip = false; ?>
    <?php for ($i = 1; $i <= $pageCount; $i++) { ?>
        <?php if ($i !== 1 && $i !== $pageCount && ($i > $page + 2 || $i < $page - 2)) { ?>
            <?php if (!$skip) { ?>
                <?php $skip = true; ?>
                <li class="pagination-item">
                    <span>...</span>
                </li>
            <?php } ?>
            <?php continue; ?>
        <?php } ?>
        <?php $skip = false; ?>
        <?php if ($i === $page) { ?>
            <li class="pagination-item is-current">
                <span class="pagination-link"><?= $i ?></span>
            </li>
        <?php } else { ?>
            <li class="pagination-item">
                <a href="/blogs/blog/?page=<?= $i ?>" class="pagination-link" title=""><?= $i ?></a>
            </li>
        <?php } ?>
    <?php } ?>
    <?php if ($page !== $pageCount) { ?>
        <li class="pagination-item">
            <a href="/blogs/blog/?page=<?= $page + 1 ?>" class="pagination-link" title="Следующая">
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
        </li>
    <?php } ?>
</ul>
