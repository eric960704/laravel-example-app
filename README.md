# Laravel示範專案

## 版本

        php: 8.2,
        laravel: 11.0

## 用途

展示個人laravel寫作方式，部份功能僅出現一次簡單演示用

* 寫作風格
* 專案架構
* 註解
* 單元測試
* migration
* model

## 安裝步驟

1.複製環境設定

`cp .env.example .env`

2.執行容器

`docker-compose up -d`

3.安裝套件

`docker-compose run --rm composer update`

4.建立金鑰

`docker-compose run --rm artisan key:generate`


5.建立資料庫

`docker-compose run --rm artisan migrate` 

## 專案架構

![](https://ithelp.ithome.com.tw/upload/images/20210918/20124802gTyNzzYd3x.png)

* Controller : 接收request，調用其他 service
* Service : 處理商業邏輯
* Repository : 輔助model，處理資料庫邏輯
* Model : 僅當成 Eloquent class
* Transformer : 處理回傳資料
* View : 使用 blade 將資料 binding 到 HTML


