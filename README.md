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
-   Header, Section, Footer に分けて実装。
-   https://laravel.com/docs/12.x/blade#section-directives

### Controller

-   ユーザーが Request を送るとその Request の流れを制御し Controller に移動する。
    -   Controller はその Request をどのように処理すべきかを決定する。
-   app->http->cotroller
-   php artisan make:controller --help で命令語を把握する。
-   Single Action Controller は一般 Controller とは違って invoke Method 一つだけを持ちます。

-   Resource Controller
    -   php artisan make:controller [Controller_name] -r
    -   CRUD の Resource を自動的に作ってくれる。
        -   Route::resource('/blog', BlogController::class);

### Database

-   Migration
    -   php artisan migrate:refresh -> Migration を Rollback して最初から Migration をやり直すこと。

### Model

-   php artisan make:model
-   php artisan make:model -m -> migration ファイルも一緒に作成してくれる。

-   Laravel で Model は Database。
    -   Database の Table の属性と構成要素を決める。
-   Seeder
    -   php artisan make:seeder [seeder_name]
    -   php artisan db:seed
-   Factories
    -   php artisan make:factory [factory_name]
    -   name_rules -> ex) UserFactory
-   すでに存在する Table に新しい Column を追加する場合。

    -   php artisan make:migrate [name] --table=[追加したい Table 名]

-   SoftDelete
    -   Model に SoftDelete を適用すると、Delete しても完全に削除されるのだはなく Delete した時間が残ります、
        これによって[onlyTrashed()->get()]method を使って以前削除した Data を確認できます。
    -   復元する方法
        -   withTrashed()->find([number])->restore();で SoftDelete されていた Data を復元できる。

### Form and Validation

-   CSRF
    -   Token を生成する。
    -   Laravel は自動的に Unique な Token を作成し UserSession に保存する。
        -   CSRF 攻撃を防ぐために CSRF Token を使用する。
        -   Form を通じて Data を送るときにこの CSRF Token を一緒に送って Request が信じられるのかを確認する。
        -   <input type="hidden" name="__token" value="{{ csrf_token() }}">あるいは＠csrf を追加して使用する。

## Eloquent ORM

-   1 : 1
    -   hasOne()
        -   親の Model に書く
        -   ex) 一つのユーザーは一つの Profile を持つ
    -   belongsTo()
        -   子の Model に書く
        -   ex)　 Profile Model で User Model を参照
-   1 : N
    -   hasMany()
        -   親の Model に書く
        -   ex)　一つの User が一個以上の Post を持つことができる。
    -   belongsTo()
        -   子の Model に書く
        -   ex)　 Post は一人の User に属する。
-   N : N
    -   belongsToMany()
        -   両方の Model 全部に書く
        -   両方の Model の間に N：N の関係を設定。
        -   一人の User は一個以上の Role を持つことができるし、一つの Role も一人以上の User を持つことができる。
        -   中間テーブルが必要
            -   role_user(foreign_key[user_id],role_id)
-   hasMany Trough
    -   中間テーブルを通して Search
    -   一つの国家に属する User が作成した全ての Post を照会
    -   ex) Country->User->Post
-   Polymorphic Relationships
    -   Post と Video は両方とも Comment を持つことができる。
    -   一つの Comment が色んな Model（Post,Video)に連結可能。
    -   morphTo()
        -   子 Model に書く
        -   commentable という Column を通じて Dynamic に関係を設定。
    -   morphMany()
        -   親 Model に書く
        -   Comment Model をポリモーフィズムに連結

## Middleware

-   Middleware は HTTP Request と Response の間で特定の作業をする Filter の役割をする。

    -   ex)
        -   User の Login 可否を確認(auth Middleware)
        -   特定した要請を Logging(log Middleware)
        -   サイトがメンテナンスモードなのかを確認(maintenance Middleware)

-   Controller Middleware
    -   特定した Controller の内部でのみ動作する Middleware
    -   \_\_construct()の内部で Middleware（）method を使って適用する。
    -   特定 Method にのみ適用する例
        -   $this->middleware('auth')->only('edit','update');
    -   特定 Method を除外する例
        -   $this->middleware('auth')->except('index');
-   Global Middleware
    -   全ての HTTP Request に対して常に実行される Middleware
    -   app/Http/Kernel.php の$middleware 配列に登録
