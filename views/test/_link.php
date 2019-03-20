<?php if ($link): ?>
    <h1>Ссылка на <?= $link->name ?></h1>
	<p> <?= $link->text ?>
    <div id = "js_close"> Закрыть </div>    
<?php endif; ?>