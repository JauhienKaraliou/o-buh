<nav>
    <ul class="pagination">
        <li>
            <a href="<?= View::generateLink(array($area, $pageCur - 1)) ?>" aria-label="<?= View::lang
            ('Previous') ?>">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php for ($page = 1; $page <= $this->pagesNum; $page++) { ?>
            <li><a href="<?= View::generateLink(array($area, $page)) ?>"><?= $page ?></a></li>
        <?php } ?>
        <li>
            <a href="<?= View::generateLink(array($area, $pageCur + 1)) ?>" aria-label="<?= View::lang('Next')
            ?>">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
