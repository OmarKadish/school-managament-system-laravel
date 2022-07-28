Bu Laravel ile yapılmış bir projedir, o yüzden proje dosyalarını xamp ya da usbwebserver klasörüne aktarmanıza gerek yok.
1. Composer'i indirmenizi gerekiyor indirmek için bu linki kullanın https://getcomposer.org/download/ 

2. Proje Kaynak kodunu indirip zip dosyasını çıkartıktan sonra
 projeyi açıp Terminal'de bu komutla Composer'i projeye eklememiz gerekiyor. 
(composer install)

3. Ardından Terminal'de bu komut ile (php artisan key:generate)
  .env dosyasındaki APP_KEY değerini ayarlayabilirsiniz.

4. Proje Veri tabanını oluşturun:
	Uygulamayı doğru bir şekilde kurmak ve çalıştırmak için
 	phpmyadmin'e gidin ve yeni bir veritabanı oluşturup adı ise .env dosyasındaki DB_DATABASE derğeri ile aynı olmalı.
  	veritabanı kullanıcı adını ve parolasını .env dosyası ile PhpMyAdmin kullanıcı hesabınız
 	arasında aynı olacak şekilde değiştirin. (DB_USERNAME ve DB_PASSWORD).

5. Ardından Veri tabanında tablolar oluşturmak ve seed verileri eklemek için 
	VS code ya da PhpStorm benzer editörlerdeki terminal kısmına bu komutu kullanın (php artisan migrate:fresh --seed).
	Not: geçen komutu tabloları sıfırlamayı istediğiniz zaman kullanabilirsiniz.

6. Şimdi Projeyi çalıştırmak için her şey hazırdır. istediğiniz zaman projeyi çalıştırmak için terminal kısmına
	 bu komutu kullanabilirsiniz (php artisan serve).

Anlatım Videosu:
https://drive.google.com/file/d/1eOhaKcG7jx9RNAkUpbRI0M8Sk1XJdJaB/view?usp=sharing