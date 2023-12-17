<?php

namespace Tugas\core;

class Flasher
{
    public static function setFlash(string $title, string $text, string $icon): void
    {
        $_SESSION['flash'] = [
            'title' => $title,
            'text' => $text,
            'icon' => $icon
        ];
    }

    public static function flash(): void
    {
        if (isset($_SESSION['flash'])) {

            echo ' <script>
            Swal.fire({
               title: "' . $_SESSION['flash']['title'] . '",
               icon: "' . $_SESSION['flash']['icon'] . '",
               text: "' . $_SESSION['flash']['text'] . '",
               position: "top-end",
               timer: 4500,
               toast: true,
               showConfirmButton: false,
               timerProgressBar: true
            });
         </script>';

            unset($_SESSION['flash']);
        }
    }
}
