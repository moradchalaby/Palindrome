<?php 
require 'Palindrom.php';


$paragraf = "Ada, ala, efe, ata, ana, kabak gibi a birçok palindrom kelime Türkçe dilinde mevcuttur. Ayrıca bazı palindrom cümleler de ilgi çekicidir. Örneğin 'Arazi küçük iz ara' gibi cümleler hem anlamlı hem de palindromdur. Ancak 'Ah adi demir erimedi daha' cümlesindeki 'adi' kelimesi palindrom değildir.

Palindromları bulmak eğlenceli bir dil oyunudur. 'Kazak' kelimesini tersinden okuduğunuzda da aynı sonucu alırsınız. Ayrıca bazı palindrom kelimelerin baş harflerini sıralayarak da yeni palindromlar oluşturabilirsiniz. Örneğin 'Efe' kelimesini bu şekilde oluşturabilirsiniz.

Sonuç olarak, palindromlar Türkçe dilinde de oldukça ilginç ve eğlenceli bir konudur. Dilin yapısı içinde gizli bu tür özellikleri keşfetmek, dilbilgisine olan hakimiyeti artırırken aynı zamanda zekice bir oyun sunar.";


$palindrom = new Palindrom();

echo json_encode($palindrom->palindrom_paragraf($paragraf), JSON_UNESCAPED_UNICODE);
