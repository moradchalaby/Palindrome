# Palindrom Bulma Sınıfı

Bu PHP sınıfı, bir kelimenin veya paragraftaki palindrom kelime ve kelime dizilerini bulmanıza olanak sağlar.

## Kullanım

```php
require 'PalindromBul.php';

$palindrom = new PalindromBul();

// Tek bir kelimenin palindrom olup olmadığını kontrol etmek için
$is_palindrome = $palindrom->palindrom_mu("ana");

// Bir paragraftaki palindromları bulmak için
$paragraph = "Ara; kazakla kayak arası 12321.";
$palindrome_results = $palindrom->palindrom_paragraf($paragraph);
```

## Fonksiyonlar
```php
palindrom_mu($kelime)
```
Verilen kelimenin bir palindrom olup olmadığını kontrol eder.

```$kelime```: Kontrol edilecek kelime.
```php
palindrom_paragraf($paragraf)
````


Verilen paragraftaki palindrom kelimeleri ve kelime dizilerini bulur.


```$paragraf```: Palindrom aranacak paragraf.
## Lisans
Bu proje MIT lisansı altında lisanslanmıştır. Daha fazla bilgi için [LİSANS](LICENSE) dosyasına göz atın.