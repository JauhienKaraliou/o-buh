<nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
<?php for($page = 1; $page <= $this -> pagesNum; $page++) { ?>
  <li><a href="<?= BASE_URL.$page ?>"><?= $page ?></a></li>
<?php } ?>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
