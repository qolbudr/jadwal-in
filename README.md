# SIJaru (Sistem Penjadwalan Ruangan)

SiJaru aplikasi berbasis web untuk melakukan penjadwalan perkuliahan.

- Data Master
- Ruangan terisi saat ini
- ✨Magic ✨


## Instalasi

SIJaru need [XAMPP](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.3/xampp-windows-x64-7.4.3-0-VC15-installer.exe/download) v7.4.3 to run.

Download this repo or clone using this command.

```sh
git clone https://github.com/qolbudr/jadwal-in.git
```

Make a database with name  ```db_sijaru```

Install the dependencies and start migration.

```sh
cd jadwal-in
composer install
php artisan migrate
```

Run the seeder to fill your database

```sh
php artisan db:seed UserSeeder && php artisan db:seed RoomSeeder && php artisan db:seed ProdiSeeder && php artisan db:seed ClassSeeder && php artisan db:seed SubjectSeeder && php artisan db:seed ScheduleSeeder
```

Start the server...

```sh
php artisan serve
```

## Screenshot

<img src="https://raw.githubusercontent.com/qolbudr/jadwal-in/master/screenshot.png" width="100%" />
