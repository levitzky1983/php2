<?php
    function imageResize($outfile,$infile,$neww,$newh,$quality) {
        $im=imagecreatefromjpeg($infile);
        $im1=imagecreatetruecolor($neww,$newh);
        imagecopyresampled($im1,$im,0,0,0,0,$neww,$newh,imagesx($im),imagesy($im));
        imagejpeg($im1,$outfile,$quality);
        imagedestroy($im);
        imagedestroy($im1);
    }

    function nameСomparison($name,$path) {
        $arrName = scandir($path);
        if (in_array($name,$arrName)) {
            return true; 
        }
        return false;    
    }


    function addImages($name,$path,$pathPreview) {
        $message='';
        for($i = 0; $i < count($_FILES[$name]['tmp_name']); $i++){
           // print_r($_FILES);
            print_r($_FILES[$name]['size']);
            if ($_FILES[$name]['error'][$i]) {
                $message .= 'Ошибка загрузки файла '.$_FILES[$name]['name'][$i].$_FILES[$name]['error'];
            } elseif ($_FILES[$name]['size'][$i] > 1000000) {
                $message .= 'Файл '.$_FILES[$name]['name'][$i].' слишком большой';
            } elseif (nameСomparison($_FILES[$name]['name'][$i],$path)) {
                $message .= 'Файл с именем '.$_FILES[$name]['name'][$i].' существует.';
            } elseif (move_uploaded_file($_FILES[$name]['tmp_name'][$i],$path.$_FILES[$name]['name'][$i])) {
                $message .= $_FILES[$name]['name'][$i].' успешно передан в галерею.';
                imageResize($pathPreview.$_FILES[$name]['name'][$i], $path.$_FILES[$name]['name'][$i], 200, 200, 75);
            } else {
                $message .=  "Загрузка не удалась.";
            } 
        }
        return $message;
    }
    