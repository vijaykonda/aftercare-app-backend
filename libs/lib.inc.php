<?

function rem_html ($tekst) {
	$t = "$tekst";
	$t = strip_tags($t);
	$t = str_replace("'", "&quot;", $t);
	$t = str_replace('"', "&quot;", $t);
	$t = str_replace(">", "", $t);
	$t = str_replace("<", "", $t);
	$t = trim($t);
	return $t;
}


function randnom($ns)
{
   $to = "07812193785465754386aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ";
   for ($i=0; $i < $ns; $i++)
   {
       $randnom .= substr($to, rand(0, strlen($to)-1), 1);
   }
   return $randnom;
}


function cyr2m ($msg) {
	$msgen = str_replace("а", "а", $msg);
	$msgen = str_replace("б", "б", $msgen);
	$msgen = str_replace("в", "в", $msgen);
	$msgen = str_replace("г", "г", $msgen);
	$msgen = str_replace("д", "д", $msgen);
	$msgen = str_replace("е", "е", $msgen);
	$msgen = str_replace("ж", "ж", $msgen);
	$msgen = str_replace("з", "з", $msgen);
	$msgen = str_replace("и", "и", $msgen);
	$msgen = str_replace("й", "й", $msgen);
	$msgen = str_replace("к", "к", $msgen);
	$msgen = str_replace("л", "л", $msgen);
	$msgen = str_replace("м", "м", $msgen);
	$msgen = str_replace("н", "н", $msgen);
	$msgen = str_replace("о", "о", $msgen);
	$msgen = str_replace("п", "п", $msgen);
	$msgen = str_replace("р", "р", $msgen);
	$msgen = str_replace("с", "с", $msgen);
	$msgen = str_replace("т", "т", $msgen);
	$msgen = str_replace("у", "у", $msgen);
	$msgen = str_replace("ф", "ф", $msgen);
	$msgen = str_replace("х", "х", $msgen);
	$msgen = str_replace("ц", "ц", $msgen);
	$msgen = str_replace("ч", "ч", $msgen);
	$msgen = str_replace("ш", "ш", $msgen);
	$msgen = str_replace("щ", "щ", $msgen);
	$msgen = str_replace("ъ", "ъ", $msgen);
	$msgen = str_replace("ь", "ь", $msgen);
	$msgen = str_replace("ю", "ю", $msgen);
	$msgen = str_replace("я", "я", $msgen);
	$msgen = str_replace("А", "а", $msgen);
	$msgen = str_replace("Б", "б", $msgen);
	$msgen = str_replace("В", "в", $msgen);
	$msgen = str_replace("Г", "г", $msgen);
	$msgen = str_replace("Д", "д", $msgen);
	$msgen = str_replace("Е", "е", $msgen);
	$msgen = str_replace("Ж", "ж", $msgen);
	$msgen = str_replace("З", "з", $msgen);
	$msgen = str_replace("И", "и", $msgen);
	$msgen = str_replace("Й", "й", $msgen);
	$msgen = str_replace("К", "к", $msgen);
	$msgen = str_replace("Л", "л", $msgen);
	$msgen = str_replace("М", "м", $msgen);
	$msgen = str_replace("Н", "н", $msgen);
	$msgen = str_replace("О", "о", $msgen);
	$msgen = str_replace("П", "п", $msgen);
	$msgen = str_replace("Р", "р", $msgen);
	$msgen = str_replace("С", "с", $msgen);
	$msgen = str_replace("Т", "т", $msgen);
	$msgen = str_replace("У", "у", $msgen);
	$msgen = str_replace("Ф", "ф", $msgen);
	$msgen = str_replace("Х", "х", $msgen);
	$msgen = str_replace("Ц", "ц", $msgen);
	$msgen = str_replace("Ч", "ч", $msgen);
	$msgen = str_replace("Ш", "ш", $msgen);
	$msgen = str_replace("Щ", "щ", $msgen);
	$msgen = str_replace("Ъ", "ъ", $msgen);
	$msgen = str_replace("Ь", "ь", $msgen);
	$msgen = str_replace("Ю", "ю", $msgen);
	$msgen = str_replace("Я", "я", $msgen);
	return $msgen;
}

function cyr2g ($msg) {
	$msgen = str_replace("а", "А", $msg);
	$msgen = str_replace("б", "Б", $msgen);
	$msgen = str_replace("в", "В", $msgen);
	$msgen = str_replace("г", "Г", $msgen);
	$msgen = str_replace("д", "Д", $msgen);
	$msgen = str_replace("е", "Е", $msgen);
	$msgen = str_replace("ж", "Ж", $msgen);
	$msgen = str_replace("з", "З", $msgen);
	$msgen = str_replace("и", "И", $msgen);
	$msgen = str_replace("й", "Й", $msgen);
	$msgen = str_replace("к", "К", $msgen);
	$msgen = str_replace("л", "Л", $msgen);
	$msgen = str_replace("м", "М", $msgen);
	$msgen = str_replace("н", "Н", $msgen);
	$msgen = str_replace("о", "О", $msgen);
	$msgen = str_replace("п", "П", $msgen);
	$msgen = str_replace("р", "Р", $msgen);
	$msgen = str_replace("с", "С", $msgen);
	$msgen = str_replace("т", "Т", $msgen);
	$msgen = str_replace("у", "У", $msgen);
	$msgen = str_replace("ф", "Ф", $msgen);
	$msgen = str_replace("х", "Х", $msgen);
	$msgen = str_replace("ц", "Ц", $msgen);
	$msgen = str_replace("ч", "Ч", $msgen);
	$msgen = str_replace("ш", "Ш", $msgen);
	$msgen = str_replace("щ", "Щ", $msgen);
	$msgen = str_replace("ъ", "Ъ", $msgen);
	$msgen = str_replace("ь", "Ь", $msgen);
	$msgen = str_replace("ю", "Ю", $msgen);
	$msgen = str_replace("я", "Я", $msgen);
	$msgen = str_replace("А", "А", $msgen);
	$msgen = str_replace("Б", "Б", $msgen);
	$msgen = str_replace("В", "В", $msgen);
	$msgen = str_replace("Г", "Г", $msgen);
	$msgen = str_replace("Д", "Д", $msgen);
	$msgen = str_replace("Е", "Е", $msgen);
	$msgen = str_replace("Ж", "Ж", $msgen);
	$msgen = str_replace("З", "З", $msgen);
	$msgen = str_replace("И", "И", $msgen);
	$msgen = str_replace("Й", "Й", $msgen);
	$msgen = str_replace("К", "К", $msgen);
	$msgen = str_replace("Л", "Л", $msgen);
	$msgen = str_replace("М", "М", $msgen);
	$msgen = str_replace("Н", "Н", $msgen);
	$msgen = str_replace("О", "О", $msgen);
	$msgen = str_replace("П", "П", $msgen);
	$msgen = str_replace("Р", "Р", $msgen);
	$msgen = str_replace("С", "С", $msgen);
	$msgen = str_replace("Т", "Т", $msgen);
	$msgen = str_replace("У", "У", $msgen);
	$msgen = str_replace("Ф", "Ф", $msgen);
	$msgen = str_replace("Х", "Х", $msgen);
	$msgen = str_replace("Ц", "Ц", $msgen);
	$msgen = str_replace("Ч", "Ч", $msgen);
	$msgen = str_replace("Ш", "Ш", $msgen);
	$msgen = str_replace("Щ", "Щ", $msgen);
	$msgen = str_replace("Ъ", "Ъ", $msgen);
	$msgen = str_replace("Ь", "Ь", $msgen);
	$msgen = str_replace("Ю", "Ю", $msgen);
	$msgen = str_replace("Я", "Я", $msgen);
	return $msgen;
}

function cyr2lat ($msg) {
	$msgen = str_replace("а", "a", $msg);
	$msgen = str_replace("б", "b", $msgen);
	$msgen = str_replace("в", "w", $msgen);
	$msgen = str_replace("г", "g", $msgen);
	$msgen = str_replace("д", "d", $msgen);
	$msgen = str_replace("е", "e", $msgen);
	$msgen = str_replace("ж", "j", $msgen);
	$msgen = str_replace("з", "z", $msgen);
	$msgen = str_replace("и", "i", $msgen);
	$msgen = str_replace("й", "j", $msgen);
	$msgen = str_replace("к", "k", $msgen);
	$msgen = str_replace("л", "l", $msgen);
	$msgen = str_replace("м", "m", $msgen);
	$msgen = str_replace("н", "n", $msgen);
	$msgen = str_replace("о", "o", $msgen);
	$msgen = str_replace("п", "p", $msgen);
	$msgen = str_replace("р", "r", $msgen);
	$msgen = str_replace("с", "s", $msgen);
	$msgen = str_replace("т", "t", $msgen);
	$msgen = str_replace("у", "u", $msgen);
	$msgen = str_replace("ф", "f", $msgen);
	$msgen = str_replace("х", "h", $msgen);
	$msgen = str_replace("ц", "c", $msgen);
	$msgen = str_replace("ч", "ch", $msgen);
	$msgen = str_replace("ш", "sh", $msgen);
	$msgen = str_replace("щ", "sht", $msgen);
	$msgen = str_replace("ъ", "a", $msgen);
	$msgen = str_replace("ь", "jo", $msgen);
	$msgen = str_replace("ю", "ju", $msgen);
	$msgen = str_replace("я", "ja", $msgen);
	$msgen = str_replace("А", "A", $msgen);
	$msgen = str_replace("Б", "B", $msgen);
	$msgen = str_replace("В", "W", $msgen);
	$msgen = str_replace("Г", "G", $msgen);
	$msgen = str_replace("Д", "D", $msgen);
	$msgen = str_replace("Е", "E", $msgen);
	$msgen = str_replace("Ж", "j", $msgen);
	$msgen = str_replace("З", "Z", $msgen);
	$msgen = str_replace("И", "I", $msgen);
	$msgen = str_replace("Й", "J", $msgen);
	$msgen = str_replace("К", "K", $msgen);
	$msgen = str_replace("Л", "L", $msgen);
	$msgen = str_replace("М", "M", $msgen);
	$msgen = str_replace("Н", "N", $msgen);
	$msgen = str_replace("О", "O", $msgen);
	$msgen = str_replace("П", "P", $msgen);
	$msgen = str_replace("Р", "R", $msgen);
	$msgen = str_replace("С", "S", $msgen);
	$msgen = str_replace("Т", "T", $msgen);
	$msgen = str_replace("У", "U", $msgen);
	$msgen = str_replace("Ф", "F", $msgen);
	$msgen = str_replace("Х", "H", $msgen);
	$msgen = str_replace("Ц", "C", $msgen);
	$msgen = str_replace("Ч", "Ch", $msgen);
	$msgen = str_replace("Ш", "Sh", $msgen);
	$msgen = str_replace("Щ", "Sht", $msgen);
	$msgen = str_replace("Ъ", "A", $msgen);
	$msgen = str_replace("Ь", "Jo", $msgen);
	$msgen = str_replace("Ю", "Ju", $msgen);
	$msgen = str_replace("Я", "Ja", $msgen);
	return $msgen;
}

function cyr_golemi ($msg) {
	$msgen = str_replace("а", "А", $msg);
	$msgen = str_replace("б", "Б", $msgen);
	$msgen = str_replace("в", "В", $msgen);
	$msgen = str_replace("г", "Г", $msgen);
	$msgen = str_replace("д", "Д", $msgen);
	$msgen = str_replace("е", "Е", $msgen);
	$msgen = str_replace("ж", "Ж", $msgen);
	$msgen = str_replace("з", "З", $msgen);
	$msgen = str_replace("и", "И", $msgen);
	$msgen = str_replace("й", "Й", $msgen);
	$msgen = str_replace("к", "К", $msgen);
	$msgen = str_replace("л", "Л", $msgen);
	$msgen = str_replace("м", "М", $msgen);
	$msgen = str_replace("н", "Н", $msgen);
	$msgen = str_replace("о", "О", $msgen);
	$msgen = str_replace("п", "П", $msgen);
	$msgen = str_replace("р", "Р", $msgen);
	$msgen = str_replace("с", "С", $msgen);
	$msgen = str_replace("т", "Т", $msgen);
	$msgen = str_replace("у", "У", $msgen);
	$msgen = str_replace("ф", "Ф", $msgen);
	$msgen = str_replace("х", "Х", $msgen);
	$msgen = str_replace("ц", "Ц", $msgen);
	$msgen = str_replace("ч", "Ч", $msgen);
	$msgen = str_replace("ш", "Щ", $msgen);
	$msgen = str_replace("щ", "Щ", $msgen);
	$msgen = str_replace("ъ", "Ъ", $msgen);
	$msgen = str_replace("ь", "ь", $msgen);
	$msgen = str_replace("ю", "ю", $msgen);
	$msgen = str_replace("я", "я", $msgen);
	$msgen = str_replace("А", "A", $msgen);
	$msgen = str_replace("Б", "B", $msgen);
	$msgen = str_replace("В", "W", $msgen);
	$msgen = str_replace("Г", "G", $msgen);
	$msgen = str_replace("Д", "D", $msgen);
	$msgen = str_replace("Е", "E", $msgen);
	$msgen = str_replace("Ж", "j", $msgen);
	$msgen = str_replace("З", "Z", $msgen);
	$msgen = str_replace("И", "I", $msgen);
	$msgen = str_replace("Й", "J", $msgen);
	$msgen = str_replace("К", "K", $msgen);
	$msgen = str_replace("Л", "L", $msgen);
	$msgen = str_replace("М", "M", $msgen);
	$msgen = str_replace("Н", "N", $msgen);
	$msgen = str_replace("О", "O", $msgen);
	$msgen = str_replace("П", "P", $msgen);
	$msgen = str_replace("Р", "R", $msgen);
	$msgen = str_replace("С", "S", $msgen);
	$msgen = str_replace("Т", "T", $msgen);
	$msgen = str_replace("У", "U", $msgen);
	$msgen = str_replace("Ф", "F", $msgen);
	$msgen = str_replace("Х", "H", $msgen);
	$msgen = str_replace("Ц", "C", $msgen);
	$msgen = str_replace("Ч", "Ch", $msgen);
	$msgen = str_replace("Ш", "Sh", $msgen);
	$msgen = str_replace("Щ", "Sht", $msgen);
	$msgen = str_replace("Ъ", "A", $msgen);
	$msgen = str_replace("Ь", "Jo", $msgen);
	$msgen = str_replace("Ю", "Ju", $msgen);
	$msgen = str_replace("Я", "Ja", $msgen);
	return $msgen;
}

function format_suma_zena ($suma) {
		$suma = explode(".", $suma);
		$suma = "$suma[0]";
		$lsuma = strlen($suma);
		if ($lsuma <= 3) { $nsuma= "$suma"; }
		if ($lsuma >= 4) { $nsuma= "$suma[0] $suma[1]$suma[2]$suma[3]"; }
		if ($lsuma >= 5) { $nsuma= "$suma[0]$suma[1] $suma[2]$suma[3]$suma[4]"; }
		if ($lsuma >= 6) { $nsuma= "$suma[0]$suma[1]$suma[2] $suma[3]$suma[4]$suma[5]"; }
		if ($lsuma >= 7) { $nsuma= "$suma[0] $suma[1]$suma[2]$suma[3] $suma[4]$suma[5]$suma[6]"; }
		return $nsuma;
}

	
function show_ext($fail) {
	$fail = explode(".", $fail);
	$brd = count($fail) - 1;
	return $fail[$brd];
}

function advancedRmdir($path) { 
    $origipath = $path;
    $handler = opendir($path);
    while (true) {
        $item = readdir($handler);
        if ($item == "." or $item == "..") {
            continue;
        } elseif (gettype($item) == "boolean") {
            closedir($handler);
            if (!@rmdir($path)) {
                return false;
            }
            if ($path == $origipath) {
                break;
            }
            $path = substr($path, 0, strrpos($path, "/"));
            $handler = opendir($path);
        } elseif (is_dir($path."/".$item)) {
            closedir($handler);
            $path = $path."/".$item;
            $handler = opendir($path);
        } else {
            unlink($path."/".$item);
        }
    }
    return true;
} 
	
function format_data($data) {
	$den = substr($data, 8, 2);
	$mes = substr($data, 5, 2);
	$god = substr($data, 0, 4);
	$chas = substr($data, 11, 5);
	return "$den.$mes.$god $chas";
}

function object_to_array($data) {
    if (is_array($data) || is_object($data))     {
        $result = array();
        foreach ($data as $key => $value)
        {
            $result[$key] = object_to_array($value);
        }
        return $result;
    }
    return $data;
}

	
?>