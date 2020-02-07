<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8" />
    <link rel="icon" href="<?= base_url('assets/images/profile/azhar.png'); ?>" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="<?= base_url() ?>assets/web/css/vendor/bootstrap.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/web/css/vendor/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/web/css/vendor/slick.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/web/css/vendor/slick-theme.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/web/css/vendor/odometer-theme-default.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/web/css/main.css" rel="stylesheet" />
</head>

<body>

    <header>
        <div class="container">
            <div class="logo">
                <a href="index.html"><img src="<?= base_url('assets/images/profile/azhar.png'); ?>" style="width:8rem;" alt="" /></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="<?= base_url('website') ?>" class="active">Home</a></li>
                    <li><a href="<?= base_url('website/portfolio') ?>">Portfolio</a></li>
                    <!-- <li><a href="about.html">About Us</a></li> -->
                    <li><a href="<?= base_url('website/blog') ?>">Desain Buku Tahunan</a></li>
                    <li><a href="<?= base_url('website/contact') ?>">Contact</a></li>
                    <?php if ($user) : ?>
                        <li><a href="<?= base_url('pemesanan'); ?>">My Dashboard</a></li>
                    <?php endif; ?>

                    <li style="margin-top:-4px">
                        <?php if ($user) : ?>
                            <a href="<?= base_url('Auth/logout'); ?>" class="badge badge-primary badge-pill">Logout</a>
                        <?php else : ?>
                            <a href="<?= base_url('Auth'); ?>" class="badge badge-primary badge-pill">Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
            <div class="mobile-menu"><i class="fa fa-bars"></i></div>
        </div>
    </header>