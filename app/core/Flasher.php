<?php

class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        // jika di set atau ada $_sessionya maka : 
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                    Data Mahasiswa <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';

            //lalu ketika muncul pesan bisa kita unset(hapus)
            unset($_SESSION['flasg']);
        }
    }
}
