# 系統擷取畫面
## 首頁
- 提供登入、註冊功能
<p align="center"><img src="https://imgur.com/GYJeSkm.png"></p>

## 登入後首頁
- 可搜尋書籍名稱、查看會員資料等
<p align="center"><img src="https://imgur.com/Lr6WjCz.png"></p>

## 賣場頁面
- 提供會員上架書籍
<p align="center"><img src="https://imgur.com/MRjD7XO.png"></p>

- 上架頁面
<p align="center"><img src="https://imgur.com/33JOYXO.png"></p>

- 上架後可以看到自己上架的書籍,可進行編輯、下架書籍
<p align="center"><img src="https://imgur.com/HhCpJy1.png"></p>

- 編輯畫面
<p align="center"><img src="https://imgur.com/5Hv0FtP.png"></p>

## 訂單頁面
- 購買之訂單頁面
<p align="center"><img src="https://imgur.com/KoezOuJ.png"></p>

- 售出之訂單頁面
<p align="center"><img src="https://imgur.com/Lu6pYEz.png"></p>

- 已完成訂單頁面
<p align="center"><img src="https://imgur.com/l8rPPzt.png"></p>

## 管理員頁面
- 可將user設定為member或是移除member的身分
<p align="center"><img src="https://imgur.com/F1V1J01.png"></p>

# 系統的名稱及作用

二手書交易平台

- 能線上查找二手書籍
- 透過平台上架、販售二手書籍
- 可及時修改上架書籍之資訊
- 及時庫存變動,下單時數量跟著減少
- 方便管理使用者權限


# 系統的主要功能
## 前台

- 首頁 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::middleware(['auth:sanctum', 'verified'])->get('/mhome', function () {
    return view('mhome');})->name('mhome');

- 登入後首頁 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::get('/',[HomeController::class,'home'])->name('home');

- 訂單頁面(購買) [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::get('/orders',[OrderController::class,'index'])->name('orders.index');

- 訂單頁面(出售) [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::get('/sells',[OrderController::class,'sells'])->name('orders.sells');

- 確認訂單已完成 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::patch('/orders/{id}',[OrderController::class,'update'])->name('orders.update');

- 訂單頁面(已完成) [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::get('/orders/finish',[OrderController::class,'finish'])->name('orders.finish');

- 下訂單 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::post('/orders',[OrderController::class,'store'])->name('orders.store');

- 賣場首頁 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::get('/shops',[ShopController::class,'index'])->name('shops.index');

- 上架書籍頁面 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::get('/books/create',[BookController::class,'create'])->name('books.create');

- 儲存書籍資料 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::post('/books',[BookController::class,'store'])->name('books.store');

- 書籍詳細頁面 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::get('/books/{id}',[BookController::class,'show'])->name('books.show');

- 編輯上架書籍資料 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::get('/books/{id}/edit',[BookController::class,'edit'])->name('books.edit');

- 更新上架書籍資料 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::patch('/books/{id}',[BookController::class,'update'])->name('books.update');

- 下架書籍 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::delete('/books/{book}',[BookController::class,'destroy'])->name('books.destroy');

- 其他人的賣場頁面 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::get('/shops/{id}',[MemberController::class,'shop'])->name('members.shop')->where('id', '[0-9]+');


## 後台


- 管理員頁面 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::get('/admins',[AdminController::class,'index'])->name('admins.index');

- 移除會員權限 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::delete('/member/{member}',[MemberController::class,'destroy'])->name('members.destroy');

- 添加會員權限 [3A732100 張宸鳳](https://github.com/3A732100)

    - Route::post('/member',[MemberController::class,'store'])->name('members.store');

## ERD
<p align="center"><img src="https://imgur.com/gp9MRdl.png"></p>


## 關聯式綱要圖


## 資料表欄位設計
 - 使用者
 <p align="center"><img src="https://imgur.com/wj2Is9L.png"></p>

 - 管理員
 <p align="center"><img src="https://imgur.com/Gwltk4e.png"></p>

 - 會員
 <p align="center"><img src="https://imgur.com/zu3WJpp.png"></p>

 - 購物車
 <p align="center"><img src="https://imgur.com/zUCXvLQ.png"></p>

 - 二手書
 <p align="center"><img src="https://imgur.com/baXEId1.png"></p>

 - 訂單
 <p align="center"><img src="https://imgur.com/03xhsgg.png"></p>



# 初始專案與DB負責的同學

- 初始專案、資料庫及資料表建立 [3A732100 張宸鳳](https://github.com/3A732100)

- 資料表關連  

# 額外使用的樣板

- 首頁部分樣板- [Stylish-portfolio](https://startbootstrap.com/theme/stylish-portfolio)

  只採用了部分內容，包含圖片、選單

- 賣場相關樣板-[Shop-homepage](https://startbootstrap.com/template/shop-homepage)

  採用其版面、bar

# 系統使用者測試帳號

## 前台 - 會員

- 帳號： n@gmail.com

- 密碼： nnnnnnnn

## 後台 - 管理者

- 帳號： r@gmail.com

- 密碼： rrrrrrrr

# 系統開發人員與工作分配

## [3A732100 張宸鳳](https://github.com/3A732100)
- 查看網站首頁(登入前頁面) 
- 查看會員頁面(登入後頁面)
- 查看訂單
- 查看賣場頁面
- 上架書籍
- 顯示某商品頁面
- 下架書籍
- 更改書籍資料
- 下訂單
- 查看會員列表
- 刪除會員



    
    
