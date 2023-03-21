<header>
  <nav>
    <div>
      <?php
      if (!empty($_SESSION['pseudo']) && isset($_SESSION['pseudo'])) : ?>
        <li>
          <img src="./assets/images/uploads/<?= $_SESSION['avatar'] ?? 'default.png'; ?>" alt="Logo Profil">
          <a href="./?action=profil"><?= $_SESSION['pseudo'] ?? ''; ?></a>
        </li>
        <li><a href="./?action=disconnect">Se déconnecter</a></li>
      <?php
      endif;
      ?>
    </div>

    <ul>
      <li><a href="./">Accueil</a></li>
      <li><a href="./?action=profil">Profil</a></li>
      <li><a href="./?action=forum">Forum</a></li>

      <?php if (empty($_SESSION['pseudo']) && !isset($_SESSION['pseudo'])) : ?>
        <li><a href="./?action=login">Se connecter</a></li>
        <li><a href="./?action=register">S'inscrire</a></li>
      <?php
      endif;
      ?>
    </ul>
  </nav>
</header>