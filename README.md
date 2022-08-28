1. clone project dari github dengan perintah 'git clone https://github.com/adytia28/DHealth.git'
2. kemudian duplikat file .env.example dan beri nama .env
3. ketikkan perintah 'composer install' di terminal visual studio code
4. ketikkan perintah 'npm install && npm run dev' di terminal visual studio code
5. buka terminal baru pada VS CODE, lalu ketikkan perintah 'php artisan key generate'
6. buat database pada mysql dengan nama 'dhealth'
7. ketikkan perintah 'php artisan migrate:fresh --seed'. * file master signa dan obatalkes tidak perlu di import secara manual lagi, saya sudah buat file query mysql tersebut di seeder laravel dan itu akan otomatis ada setealh migrate selesai.
8. ketikkan perintah 'php artisan optimize:clear' di terminal VS CODE.
9. ketikkan perintah 'php artisan serve', lalu klik link localhost yang keluar dengan tekan tombol ctrl + klik kanan.
10. Jika app sudah berjalan, aplikasi siap di testing.
