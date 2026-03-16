<h1>LASk</h1>

<?php if(!isset($_SESSION['user_id'])): ?>

<a href="/LASK/public/index.php/login">Iniciar sesión</a>
<a href="/LASK/public/index.php/register">Registrarse</a>

<?php else: ?>

<p>Bienvenido <?= $_SESSION['username'] ?></p>

<?php endif; ?>


<h2>Buscar</h2>

<?php if(isset($_SESSION['user_id'])): ?>

<form action="/search" method="GET">

    <input type="text" name="q" placeholder="Buscar canciones, artistas, álbumes o tags">

    <button type="submit">Buscar</button>

</form>

<?php else: ?>

<form onsubmit="alert('Debes iniciar sesión para buscar'); return false;">

    <input type="text" placeholder="Buscar canciones, artistas, álbumes o tags">

    <button type="submit">Buscar</button>

</form>

<?php endif; ?>


<h2>Encuentra tus favoritos</h2>

<?php $tags = $tags ?? []; ?>

<?php foreach($tags as $tag): ?>

<a href="#" onclick="alert('Debes iniciar sesión'); return false;">

    <?= $tag['nombre_tag'] ?>

</a>

<br>

<?php endforeach; ?>


<h2>Nuevos Lanzamientos</h2>

<?php $songs = $songs ?? []; ?>

<?php foreach($songs as $song): ?>

<a href="#" onclick="alert('Debes iniciar sesión'); return false;">

<img src="/LASK/<?= $song['portada_cancion'] ?>" width="120">

</a>

<?php endforeach; ?>


<?php $albums = $albums ?? []; ?>

<?php foreach($albums as $album): ?>

<a href="#" onclick="alert('Debes iniciar sesión'); return false;">

<img src="/LASK/<?= $album['portada_album'] ?>" width="120">

</a>

<?php endforeach; ?>


<h2>Nuevos Artistas</h2>

<?php $artists = $artists ?? []; ?>

<?php foreach($artists as $artist): ?>

<a href="#" onclick="alert('Debes iniciar sesión'); return false;">

<img src="/LASK/<?= $artist['pfp'] ?>" width="100">

</a>

<?php endforeach; ?>