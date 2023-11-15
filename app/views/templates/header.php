<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN <?= $data["judul"]; ?> </title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
</head>
<style>
    .active {
        color: coral !important;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>">PHP MVC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                <div class="navbar-nav offset-xl-10">
                    <a class="nav-item nav-link active" href="<?= BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active" href="<?= BASEURL; ?>/mahasiswa">Mahasiswa</a>
                    <a class="nav-item nav-link active" href="<?= BASEURL; ?>/about">About</a>
                </div>
            </div>
        </div>
    </nav>