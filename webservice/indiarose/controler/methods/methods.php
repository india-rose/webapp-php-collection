<?php
function mkmap($dir, $texte){
    global $res;
    $folder = opendir ($dir);
    $pathfile = '';
    while ($file = readdir ($folder)) {
        if ($file != '.' && $file != '..') {
            $pathfile = $dir.'/'.$file;
            if(filetype($pathfile) == 'dir'){
                mkmap($pathfile, $texte);
            }
        }
        if($file == $texte)
        {
            $res = $pathfile;
        }
    }
    closedir ($folder);
    return $res;
}

function rrmdir($dir)
{
    if (is_dir($dir))
    {
        $objects = scandir($dir);
        foreach ($objects as $object)
        {
            if ($object != "." && $object != "..")
            {
                if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}
?>