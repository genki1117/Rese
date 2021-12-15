# Rese
企業用飲食店web予約サービス<br>

# 作成環境
PHP 7.4.25<br><br>
Laravel Framework 8.72.0<br><br>
Composer version 2.1.8<br><br>

# インストール方法
## composer<br>
<a href="https://getcomposer.org/download/r">Mac</a><br>
↑こちらのページ下部にある Manual Download から2.○.○.の最新バージョンのリンクをクリックしてください。<br>
ターミナルで Download ディレクトリに移動し以下のコマンドを実行します。<br><br>

```bash
$ sudo mv composer.phar /usr/local/bin/composer

$ chmod a+x /usr/local/bin/composer

```


<a href="https://getcomposer.org/doc/00-intro.md#installation-windows">Windowz</a><br>
↑こちらのページの「Installation – WindowsのUsing the Installer」の文章中に「Composer-Setup.exe」というリンクがあるのでインストーラをダウンロードしてください。

ダウンロードしたインストーラを起動します。

Composer Setup「Installation Options」

起動すると画面に「Developer mode」というチェックボックスが表示された画面が現れるのでOFFのまま「Next」をクリックします。

Composer Setup 「Settings Check」

「C:¥xampp¥php¥php.exe」を選択し「Next」をクリックします。

インストール画面まで「Next」を選択し、インストール画面では「Install」を選択します。

その後「Finish」ボタンを押したらインストール完了です。

#clone
```bash
$ cd /Applications/MAMP/htdocs/

$ git clone https://github.com/genki1117/Rese.git

$ cd Rese-20210918mochida

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

ブラウザでhttp://localhost:8000/　を開く

