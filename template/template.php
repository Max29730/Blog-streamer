<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>

    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <meta name="Description" content="Titsaoui Maxime Blog">
    <meta name="Revisit-After" content="1 day">
    <meta name="Robots" content="all">
    <meta name="Rating" content="general">
    <meta name="Distribution" content="global">

</head>

<body>

    <header>

        <h1><a href="index.php">Maxime Titsaoui - Développeur Junior</a></h1>

        <nav>
            <a href="index.php"><i class="fas fa-home"></i> Accueil</a>

            <?php if (array_key_exists('user', $_SESSION)) : ?>

            <?php if ($_SESSION['user']['Role'] == 'Admin') { ?>
            <a href="admin.php"><i class="fas fa-cogs"></i> Administration</a>
            <a href="index.php?a=gestcalendrier" class="noMobile"><i class="fas fa-calendar-alt"></i> Gestion du
                Calendrier</a>
            <?php } ?>

            <a href="index.php?a=logout"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>

            <?php else : ?>
            <a href="index.php?a=login"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
            <a href="index.php?a=register"><i class="fas fa-user"></i> S'enregistrer</a>
            <?php endif; ?>

            <a href="index.php?a=chat"><i class="fas fa-comments"></i> Messagerie instantanée</a>
            <a href="index.php?a=contact"><i class="fas fa-address-book"></i> Contact</a>
            <a href="index.php?a=calendrier"><i class="fas fa-calendar-alt"></i> Calendrier</a>
        </nav>

    </header>

    <main>

        <?php include $template ?>

    </main>

    <footer>

        <a href='https://www.freepik.com/vectors/background'>Background created by starline - www.freepik.com</a>

    </footer>


</body>

</html>