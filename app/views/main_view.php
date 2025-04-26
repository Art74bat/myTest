<?php 
    $current_page =  $paginate->current_page($_SERVER['REQUEST_URI']); //текущяя страница
    $count_page = $paginate->count();                                  // всего страниц
?>

<section class="top">
    <div class="top__wrapp">
        <h1 class="title"><?= $data[0]['title'] ?></h1>
        <h2 class="sub_title"><?= $data[0]['announce'] ?></h2>
    </div>
</section>
<section class="news">
    <h2 class="news__title">Новости</h2>  
    <?= $current_page; ?> 
    <div class="card__wrapp">
	<?php foreach ($data as $row): ?>
		<ul class="card">
    	    <li class="date"><?php
				$data = substr($row['date'],0,10);
                $data = explode('-', $data);
				echo "$data[1].$data[2].$data[0]";
			?>
			 </li>
    	    <li class="card__title"><?= $row['title']; ?></li>
    	    <li class="card_description"><?= $row['announce'] ?></li>
    	    <li class="card__btn">
    	        <a class="card__link" href="/details/index/<?=  $row['id']?>">
    	            <span>Подробнее</span>
    	            <svg class="card__arrow" xmlns="http://www.w3.org/2000/svg" width="27.004" height="13.322" fill="none"><path  d="M1.02 7.64 1 7.66c-.56 0-1-.44-1-1s.44-1 1-1l.02.02v1.96Zm23.56-.98-4.95-4.95a.99.99 0 0 1 0-1.42c.4-.39 1.02-.39 1.42 0l5.65 5.66c.4.39.4 1.02 0 1.41l-5.65 5.66c-.4.4-1.02.4-1.42 0-.4-.4-.4-1.02 0-1.41l4.95-4.95Z"/><path  fill-rule="evenodd" d="m23.58 5.66-3.95-3.95a.99.99 0 0 1 0-1.42c.4-.39 1.02-.39 1.42 0l5.65 5.66c.4.39.4 1.02 0 1.41l-5.65 5.66c-.4.4-1.02.4-1.42 0-.4-.4-.4-1.02 0-1.41l3.95-3.95H1c-.56 0-1-.44-1-1s.44-1 1-1h22.58Z"/></svg>                                          
    	        </a>
    	    </li>
    	</ul>
	<?php endforeach; ?>
	</div>
    <ul class="news_nav">
        <?php
            if ($current_page > 1):
         ?>
            <li class="news_nav__prev">
                <a class="news_nav__link news_nav__link_prev" href="<?= $current_page - 1 ?>">
                    <svg class="news_nav__arrow" xmlns="http://www.w3.org/2000/svg" width="16.763" height="13.322" fill="none"><path fill-rule="evenodd" d="M13.34 5.66 9.39 1.71a.99.99 0 0 1 0-1.42.996.996 0 0 1 1.41 0l5.66 5.66c.4.39.4 1.02 0 1.41l-5.66 5.66c-.39.4-1.01.4-1.41 0-.4-.4-.4-1.02 0-1.41l3.95-3.95H1c-.57 0-1-.44-1-1s.43-1 1-1h12.34Z"/></svg>
                </a>
            </li>
        <?php endif ?>
        <?php for ($element = 1; $element <= $count_page; $element ++): ?>
            <li class="news_nav__page"><a class="news_nav__link <?= $class = ($element == $current_page)? 'active' : ''; ?>" href="/main/index/<?= $element ?>"><?= $element ?></a></li>
        <?php endfor; ?>

        <?php
            if ($current_page < $count_page):
         ?>
        <li class="news_nav__next">                       
            <a class="news_nav__link news_nav__link_next" href="/main/index/<?= $current_page + 1 ?>">
                <svg class="news_nav__arrow" xmlns="http://www.w3.org/2000/svg" width="16.763" height="13.322" fill="none"><path fill-rule="evenodd" d="M13.34 5.66 9.39 1.71a.99.99 0 0 1 0-1.42.996.996 0 0 1 1.41 0l5.66 5.66c.4.39.4 1.02 0 1.41l-5.66 5.66c-.39.4-1.01.4-1.41 0-.4-.4-.4-1.02 0-1.41l3.95-3.95H1c-.57 0-1-.44-1-1s.43-1 1-1h12.34Z"/></svg>
            </a>
        </li>
        <?php endif ?>

    </ul>
</section>
