<?php
class File
{
	public static function deleteFile($file)
	{
        unlink($file);
	}
}
?>