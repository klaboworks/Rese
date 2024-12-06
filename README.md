# Rese
飲食店予約アプリ

## 作成した目的
飲食店予約管理

## 機能一覧
### ユーザー側
 - 会員登録
 - ログイン
 - ログアウト
 - 飲食店一覧取得
 - 飲食店詳細取得
 - 飲食店お気に入り登録
 - 飲食店お気に入り削除
 - 飲食店予約
 - 飲食店予約変更
 - 飲食店予約キャンセル
 - 飲食店検索（エリア/ジャンル/店名）

### 管理者側（管理画面）
 - 飲食店一覧取得
 - 飲食店検索（エリア/ジャンル/店名/担当店舗）
 - 店舗代表者一覧取得
 - 店舗代表者登録
 - 飲食店情報作成
 - 飲食店情報編集
 - 飲食店情報削除
 - ユーザー一覧取得
 - ユーザーにお知らせメール一括送信（手動）
 - ユーザーに予約リマインドメール送信（自動）

## 実行環境
言語：PHP 8.3.12  
フレームワーク：Laravel 11.34.2 
データベース：MySQL

## テーブル設計
[Rese_tables.pdf](https://github.com/user-attachments/files/18038944/Rese_tables.pdf)

## ER図
![ER](https://github.com/user-attachments/assets/2d809425-1c85-4a6d-a683-4fdb3acedf8a)

# 環境構築
### gitをクローン
 - `git clone git@github.com:klaboworks/Rese.git`
### PHPコンテナを生成して起動/ログイン
 - `docker-compose up -d --build`
 - `docker-compose exec php bash`
### .envファイルを作成
 - `cp .env.example .env`
### MAILER送信設定
 - .envファイルのMAILの項目を任意の設定に更新
### .envファイのルDB項目を下記に変更
    DB_CONNECTION=mysql  
    DB_HOST=mysql  
    DB_PORT=3306  
    DB_DATABASE=laravel_db  
    DB_USERNAME=laravel_user  
    DB_PASSWORD=laravel_pass  
### キーを作成
 - `php artisan key:generate`
 - `exit`
### マイグレーション
 - `docker-compose exec php bash`
 - `php artisan migrate --seed`

## 備考
 - 上記のマイグレーション(シード)実行後、管理者と店舗代表者、ユーザーが作成されます。
 - 管理者/店舗代表者が店舗を登録した際、画像が表示されない場合はシンボリックリンクが必要です。  
 コンテナ内で`php artisan storage:link`を実行してください。