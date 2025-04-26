<section class="detail_news">
	<ul class="breadcrumb">
	    <li><a class="breadcrumb__link" href="/">Главная /</a></li>
	    <li><a class="breadcrumb__link breadcrumb__link_active" href="#"><?= $data['title']?></a></li>
	  </ul>
	<h1 class="title title_detail"><?= $data['title'] ?></h1>
	<!-- <?= $back ?> -->
	<div class="section_wrapp">
	    <div class="detail_card">
	        <p class="date detail_card__date"><?php
				$date = substr($data['date'],0,10);
                $date = explode('-', $date);
				echo "$date[1].$date[2].$date[0]";
			?></p>
	        <h2 class="detail_card__title"><?= $data['announce'] ?></h2>
	        <div class="detail_card__wrapp"><?= $data['content'] ?></div>
	        <a class="card__link detail_card__btn" href="<?= $back ?>">
	            <svg class="card__arrow detail_card__arrow" xmlns="http://www.w3.org/2000/svg" width="27.004" height="13.322" fill="none"><path  d="M1.02 7.64 1 7.66c-.56 0-1-.44-1-1s.44-1 1-1l.02.02v1.96Zm23.56-.98-4.95-4.95a.99.99 0 0 1 0-1.42c.4-.39 1.02-.39 1.42 0l5.65 5.66c.4.39.4 1.02 0 1.41l-5.65 5.66c-.4.4-1.02.4-1.42 0-.4-.4-.4-1.02 0-1.41l4.95-4.95Z"/><path  fill-rule="evenodd" d="m23.58 5.66-3.95-3.95a.99.99 0 0 1 0-1.42c.4-.39 1.02-.39 1.42 0l5.65 5.66c.4.39.4 1.02 0 1.41l-5.65 5.66c-.4.4-1.02.4-1.42 0-.4-.4-.4-1.02 0-1.41l3.95-3.95H1c-.56 0-1-.44-1-1s.44-1 1-1h22.58Z"/></svg>      
	            <span>назад к новостям</span>                                    
	        </a>
	    </div>
	    <picture class="pic">
	        <img class="detail_img" src="/../app/images/jpg/<?= $data['image'] ?>" alt="картинка">
	    </picture>
	</div>
</section>