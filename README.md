# 系統擷取畫面
## 首頁
- 提供登入、註冊功能
<p align="center"><img src="https://imgur.com/GYJeSkm.png"></p>

## 登入後首頁
- 可搜尋書籍名稱、查看會員資料等
<p align="center"><img src="https://imgur.com/Lr6WjCz.png"></p>

- 檢視會員資料
<p align="center"><img src="https://i.imgur.com/CjQKHdE.png"></p>

## 搜尋頁面
- 提供關鍵字搜尋
<p align="center"><img src="https://i.imgur.com/oxYunK7.png"></p>

- 提供類別搜尋
<p align="center"><img src="https://i.imgur.com/fev83I4.png"></p>

-檢視商品，可點選加入購物車、下訂單
<p align="center"><img src="https://i.imgur.com/t7lxsDQ.png"></p>

## 購物車頁面
- 檢視購物車
<p align="center"><img src="https://i.imgur.com/wCLszdY.png"></p>

- 無法加入購物車情況一：庫存數為0
<p align="center"><img src="https://i.imgur.com/sFMcdgO.png"></p>

- 無法加入購物車情況二：為自家商品
<p align="center"><img src="https://i.imgur.com/yhRGjdA.png"></p>

- 無法加入購物車情況三：庫存數小於加入購物車數量
<p align="center"><img src="https://i.imgur.com/Uui3UQJ.png"></p>

- 商品成功加入購物車
<p align="center"><img src="https://i.imgur.com/fDYc4Uf.png"></p>

- 移除購物車商品
<p align="center"><img src="https://i.imgur.com/XTgluaB.png"></p>

- 從購物車下訂單
<p align="center"><img src="https://i.imgur.com/yRFDC8w.png"></p>

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

- 能利用關鍵字、類別查找二手書籍
- 可將商品加入購物車、移除購物車商品、透過購物車下訂單
- 及時更新購物車狀態,從購物車下單時會自動將該商品自購物車移除
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

- 檢視會員資料 [3A732080 吳宜勳](https://github.com/3A732080)

    -Route::get('members/{member}',[MemberController::class,'show'])->name('members.show')->middleware('auth'); 

- 搜尋商品 [3A732080 吳宜勳](https://github.com/3A732080)

    -Route::get('/search',[BookController::class,'search'])->name('books.search'); 
    
- 新增商品至購物車 [3A732080 吳宜勳](https://github.com/3A732080)

    -Route::get('/carts',[CartController::class,'create'])->name('carts.index');
    
- 儲存商品至購物車 [3A732080 吳宜勳](https://github.com/3A732080)
    
    -Route::post('/carts',[CartController::class,'store'])->name('carts.store');

- 刪除購物車商品 [3A732080 吳宜勳](https://github.com/3A732080)
    
    -Route::delete('/carts/{cart}',[CartController::class,'destroy'])->name('carts.destroy');

- 刪除購物車商品 [3A732080 吳宜勳](https://github.com/3A732080)
    
    -Route::get('/logout',[MemberController::class,'logout'])->name('members.logout');
    
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
<p align="center"><img src="https://i.imgur.com/rmUMEx9.jpg"></p>

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

- 資料表關連  [3A732080 吳宜勳](https://github.com/3A732080)

# 額外使用的樣板

- 首頁部分樣板- [Stylish-portfolio](https://startbootstrap.com/theme/stylish-portfolio)

  只採用了部分內容，包含圖片、選單

- 賣場相關樣板-[Shop-homepage](https://startbootstrap.com/template/shop-homepage)

  採用其版面、bar

# 系統使用者測試帳號

## 前台 - 會員

- 帳號： n@gmail.com

- 密碼： nnnnnnnn


- 帳號： a@gmail.com

- 密碼： aaaaaaaa


- 帳號： k@gmail.com

- 密碼： kkkkkkkk

## 後台 - 管理者

- 帳號： r@gmail.com

- 密碼： rrrrrrrr

# 測試檔案存放位置
- storage下->sql->final10.sql


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

## [3A732080 吳宜勳](https://github.com/3A732080)
- 登出
- 查詢商品
- 加入購物車
- 查看購物車
- 刪除購物車商品
- 透過購物車下訂單

    
    
