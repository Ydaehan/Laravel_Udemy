#　学んだこと

## php artisan

php artisam make:view : Blade ファイルを作る命令語
php artisan make:controller [name] : Controller を作成する命令
php artisan ~~ --help : 命令語の Option についた説明

### php artisan tinker

php artisan tinker : tinker Shell を実行する
→data の生成も可能。

-   Database の操作が可能
-   Helper 関数や Laravel の機能をテストできる。
-   PHP Code も自由に実行できる。
-   素早くテストしたりデータの修正が必要な場合役に立つ。

## Route

Route の仕事は Frontend からの要請に合わせて Routing する。

-   Request に対して動作を決める。
    -   どんな View を見せてあげるのか、どんな情報をあげるのかなどの動作をする。
    -

### Route Parameter

-   URL に Parameter を付与してそれぞれ違った Routing ができる。
-   Dynamic な URL

### Name Route

-   URL が変更されてもコードの修正が必要ない。
-   <a href="{{ route('about') }}">About</a>
-   見やすい
-   URL を直接使わないで Named Route を使いましょう。

### Route Group

-   'prefix' を使って繰り返して使われる URL、共通した URL 文字列をまとめて Group 化する。
-   その後の 'as' Parameter は Route の Name→ 一般的に　. は使わない。

### Route Method

-   web.php 参考

### Fallback Route

-   あまり必要ない。
    -   Laravel には基本的に Fallback Route が存在する。
        -   ４０４
-   web.php 参考

### Blade

-   HTML, CSS, JS はもちろん PHP コードも使うことができる。
-
