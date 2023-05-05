<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='public/css/<?= $css ?>'>
    <title> <?= $title ?> </title>
</head>

<body>

    <header>

        <!-- PRODUCTS SELECT MENU -->
        <nav>
            <ul>
                <li>
                    <a href="">All products</a>
                </li>
                <li>
                    <a href="">Smartphones</a>
                </li>
                <li>
                    <a href="">Accessories</a>
                </li>
                <li>
                    <a href="">Smartwatches</a>
                </li>
                <li>
                    <a href="">Bracelets/Watch cases</a>
                </li>
            </ul>
        </nav>

        <!-- MAIN NAV -->
        <nav>

            <!-- LOGO -->
            <ul>
                <li>
                    <a href="">Fone</a>
                </li>
            </ul>

            <!-- LINKS -->
            <ul>
                <li>
                    <a href="">HOME</a>
                </li>
                <li>
                    <a href="">PRODUCTS</a>
                </li>
                <li>
                    <a href="">SALE</a>
                </li>
                <li>
                    <a href="">ABOUT</a>
                </li>
                <li>
                    <a href="">CONTACT</a>
                </li>
            </ul>

            <!-- BUTTONS -->
            <ul>
                <li>
                    <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa-regular fa-heart"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa-solid fa-bag-shopping"></i></a>
                </li>
                <li>
                    <a href="">3</a>
                </li>
            </ul>
        </nav>


    </header>

    <main>
        <?= $content ?>
    </main>

    <footer>

    </footer>

</body>

</html>