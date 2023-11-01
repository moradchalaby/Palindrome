
<?php

class Palindrom
{

    //array_reverse() fonksiyonunda türkçe karakter problemini bu şekilde çözdüm
    public function terscevir($string, $encoding = null)
    {
        if ($encoding === null) {
            $encoding = mb_internal_encoding();
        }
        return join('', array_reverse(mb_str_split($string, 1, $encoding)));
    }
    public function palindrom_mu($kelime)
    {
        mb_internal_encoding('UTF-8');

        $kelime = mb_strtolower($kelime, 'utf-8'); // Tüm harfleri küçük harfe çevir
        $kelime = preg_replace('/\s+/', '', $kelime); // Boşlukları temizle
        $kelime = preg_replace('/[^\p{L}\p{N}\s]/u', '', $kelime); // Sadece harf ve rakamları tut.
        $reverse = $this->terscevir($kelime, 'utf-8'); // Ters çevir
        if ($kelime === $reverse) {
            return true;
        } else {
            return false;
        }
    }



    public function palindrom_paragraf($paragraf)
    {
        $kelimeler = explode(' ', $paragraf); //paragrafta ki kelimeleri ayırdım.
        $sonuc = [
            'kelime' => array(),
            'kelimeDizisi' => array()
        ];

        $kelime_sayisi = count($kelimeler); //Metindeki kelimelerin sayısı

        for ($i = 0; $i < $kelime_sayisi; $i++) { // Bu döngü bütün kelimeleri kontrol edecek
            $kelime = $kelimeler[$i];

            if ($this->palindrom_mu($kelime) && mb_strlen($kelime, 'UTF-8') > 1) { 
                $kelime = preg_replace('/[^\p{L}\p{N}\s]/u', '', $kelime); //1 karakterden büyük kelimeleri ve palindrom olan kelimeler seçiliyor
                $sonuc['kelime'][] = $kelime;
            }

            for ($j = $i + 1; $j < $kelime_sayisi; $j++) { // Bu döngü kelimeleri bir sonraki kelime ile birleştirerek kontrole devam edecek( Kelime Dizisi)
                $kelime .= ' ' . $kelimeler[$j];


                if ($this->palindrom_mu($kelime) && mb_strlen($kelimeler[$j], 'UTF-8') > 1) { // 1 karakterden büyük ve palindrom olan kelimedizileri seçiliyor
                    $kelime = preg_replace('/[^\p{L}\p{N}\s]/u', '', $kelime); 
                    $sonuc['kelimeDizisi'][] = $kelime;
                }
            }
        }
        if (empty($sonuc['kelime'])) {
            $sonuc['kelime'] = 'Palindrom Kelime Bulunamadı!';
        } else {
       

            $sonuc['kelime'] = array_unique(array_map('strtolower', $sonuc['kelime'])); // Tüm elemanları küçük harfe dönüştürüp,Dizideki benzer elemanlar kaldırılıyor

            sort($sonuc['kelime']);
        }
        if (empty($sonuc['kelimeDizisi'])) {
            $sonuc['kelimeDizisi'] = 'Palindrom Kelime Dizisi Bulunamadı!';
        } else {

            $sonuc['kelimeDizisi'] = array_unique(array_map('strtolower', $sonuc['kelimeDizisi']));// Tüm elemanları küçük harfe dönüştürüp,Dizideki benzer elemanlar kaldırılıyor

            sort($sonuc['kelimeDizisi']);
        }

        return $sonuc;
    }
}




$paragraf = "Ada, ala, efe, ata, ana, kabak gibi a birçok palindrom kelime Türkçe dilinde mevcuttur. Ayrıca bazı palindrom cümleler de ilgi çekicidir. Örneğin 'Arazi küçük iz ara' gibi cümleler hem anlamlı hem de palindromdur. Ancak 'Ah adi demir erimedi daha' cümlesindeki 'adi' kelimesi palindrom değildir.

Palindromları bulmak eğlenceli bir dil oyunudur. 'Kazak' kelimesini tersinden okuduğunuzda da aynı sonucu alırsınız. Ayrıca bazı palindrom kelimelerin baş harflerini sıralayarak da yeni palindromlar oluşturabilirsiniz. Örneğin 'Efe' kelimesini bu şekilde oluşturabilirsiniz.

Sonuç olarak, palindromlar Türkçe dilinde de oldukça ilginç ve eğlenceli bir konudur. Dilin yapısı içinde gizli bu tür özellikleri keşfetmek, dilbilgisine olan hakimiyeti artırırken aynı zamanda zekice bir oyun sunar.";


$palindrom = new Palindrom();

echo json_encode($palindrom->palindrom_paragraf($paragraf), JSON_UNESCAPED_UNICODE);
?>


