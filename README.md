# Rese
企業用飲食店web予約サービス<br>

# 作成環境
PHP 7.4.25<br><br>
Laravel Framework 8.72.0<br><br>
Composer version 2.1.8<br><br>

# インストール方法

#clone
```bash
$ cd /Applications/MAMP/htdocs/

$ git clone https://github.com/genki1117/Rese.git

$ cd Rese

$ composer install

$ cp .env.example .env

$ php artisan key:generate

$ php artisan config:clear
```


データベース設定(MySQL)

```bash
$ cd

$ mysql -u root -p

$ create database rese;
```


.envファイルの設定
```bash
APP_ENV=local

APP_URL=http://localhost:8000

DB_HOST=127.0.0.1

DB_DATABASE=rese

DB_USERNAME=root

DB_PASSWORD=パスワード
```

データベース設定後
```bash
$ php artisan migrate

$ php artisan db:seed

$ php artisan serve
```

ブラウザで http://localhost:8000/　を開く


オーナー管理画面
```bash
http://localhost:8000/owner/register
```
オーナーログイン
```bash
http://localhost:8000/owner/login
```
管理者管理画面
```bash
http://localhost:8000/admin/login
```

# heroku
## ユーザーログインページ
```bash
http://glacial-river-01328.herokuapp.com/login
```
テストアカウント
メールアドレス
```bash
user@example.com
```
パスワード
```bash
useruser
```
## オーナーログインページ
```bash
http://glacial-river-01328.herokuapp.com/owner/login
```
テストアカウント
メールアドレス
```bash
testowner@example.com
```
パスワード
# heroku
```bash
ownerowner
```
