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
?>

<!-- Tests -->
<?php
    // $res = mkmap('../../layout/images/home', 5);
    // echo $res;

    $UneChaine = "fruits et legumes";
    $UneChaine = str_replace(" ", "_", $UneChaine);
    echo $UneChaine;
?>