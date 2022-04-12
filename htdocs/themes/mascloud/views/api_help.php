<?php $this->load->view("defaults/header");?>

<div class="row">
	<div class="span12">
		<div class="page-header">
			<h1>API</h1>
		</div>
	</div>
	<div class="span12">
	    <p class="explain border">Создание заметок из командной строки</p>

        <h2>API URL</h2>
        <p class="explain"><code><?php echo site_url('api'); ?></code></p>

        <h2>Получить заметку</h2>
        <p class="explain"><code><?php echo site_url('api/paste/[pasteid]'); ?></code></p>

        <h2>Получить случайную заметку</h2>
        <p class="explain"><code><?php echo site_url('api/random'); ?></code></p>

        <h2>Получить последние заметки</h2>
        <p class="explain"><code><?php echo site_url('api/recent'); ?></code></p>

        <h2>Получить популярные заметки</h2>
        <p class="explain"><code><?php echo site_url('api/trending'); ?></code></p>

        <h2>Список доступных языков</h2>
        <p class="explain"><code><?php echo site_url('api/langs'); ?></code></p>

        <h2>Создать заметку</h2>
        <p class="explain"><code><?php echo site_url('api/create'); ?></code></p>

		<h3>POST параметры</h3>
		<code>text=[your paste text]</code>
	    <p class="explain">Содержимое заметки. Обязательный.</p>

		<code>title=[title]</code>
	    <p class="explain">Название заметки.</p>

		<code>name=[name]</code>
	    <p class="explain">Имя автора.</p>

		<code>private=1</code>
	    <p class="explain">Сделайте заметку приватной.</p>

		<code>lang=[language]</code>
	    <p class="explain">
		Используйте альтернативную подсветку синтаксиса.<br />
		Возможные значения: <?php echo $languages; ?>
	    </p>

		<code>expire=[minutes]</code>
	    <p class="explain">Установите срок действия заметки.</p>

		<code>reply=[pasteid]</code>
	    <p class="explain">Ответ на существующую заметку.</p>

		<h3>Возвращаемые значения</h3>
	    <p class="explain">
		В случае успеха API возвращает URL-адрес вставки: <code><?php echo site_url('view/[pasteid]'); ?></code><br />
		При ошибке API возвращает сообщение об ошибке: <code>Error: Missing paste text</code>
	    </p>

		<h2>Примеры</h2>
		<h3>Создать заметку</h3>
		<code>curl -d text='это мой текст' <?php echo site_url('api/create'); ?></code>
	    <p class="explain">Создайте заметку с текстом 'это мой текст'.</p>

		<h3>Создать заметку из файла</h3>
		<code>curl -d private=1 -d name=Васян --data-urlencode text@/etc/passwd <?php echo site_url('api/create'); ?></code>
	    <p class="explain">Создайте приватную заметку с автором 'Васян' и содержимым '/etc/passwd'.</p>

		<h3>Создать заметку из файла PHP</h3>
		<code>curl -d lang=php --data-urlencode text@main.php <?php echo site_url('api/create'); ?></code>
	    <p class="explain">Создайте заметку с подсветкой синтаксиса PHP.</p>

		<h3>Создать заметку через терминал</h3>
		<code>echo foo | curl --data-urlencode text@- <?php echo site_url('api/create'); ?></code>
	    <p class="explain">Создайте заметку на основе стандартного вывода команды.</p>

		<h3>Получить заметку ;-)</h3>
		<code>curl <?php echo site_url('view/raw/[pasteid]'); ?></code>
	    <p class="explain">Отображает заметку.</p>
	</div>
</div>

<?php $this->load->view("defaults/footer");?>
