<?php

class view
{
    public static function render($view, array $params = [])
    {
        
        if (file_exists($file = VDIR."/{$view}.php")) {            
            extract($params);

            ob_start();

            require $file;

            echo ob_get_clean();
        } else {
            exit("Görünüm dosyası bulunamadı: $view");
        }
    }
}
