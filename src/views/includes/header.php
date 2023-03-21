<header>
  <nav>
    <?php
    if (!empty($_SESSION['pseudo']) && isset($_SESSION['pseudo'])) : ?>
      <div id="box-profil">
        <img src="./assets/images/uploads/<?= $_SESSION['avatar'] ?? 'default.png'; ?>" alt="Logo Profil">
        <a href="./?action=profil"><?= $_SESSION['pseudo'] ?? ''; ?></a>
        <a href="./?action=disconnect">Se déconnecter</a>
      </div>
    <?php
    endif;
    ?>

    <?php if (empty($_SESSION['pseudo']) && !isset($_SESSION['pseudo'])) : ?>
      <div id="box-profil">
        <img src="./assets/images/import/chatnonymous.jpg">
        <a href="./?action=login">Se connecter</a>
        <a href="./?action=register">S'inscrire</a>
      </div>
    <?php
    endif;
    ?>
    <ul>
      <li><a href="./">Accueil</a></li>
      <li><a href="./?action=forum">Forum</a></li>
    </ul>
  </nav>
</header>