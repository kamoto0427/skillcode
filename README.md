## 環境の起動
Docker desktopでskillcodeのコンテナを起動する<br>
sailなので、コンテナに入る必要はない。以下でartisanコマンドを叩ける<br>
```skillcode % sail artisan migrate:status ```

## テストを実行したい場合
### 全て実行
```% sail artisan test```

### 個別ファイルをテストする
```% sail artisan test tests/Unit/Request/PlanRequestTest.php```