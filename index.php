<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trang chủ</title>
        <link rel="stylesheet" href="/public/css/index.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="header">
            <h1 id="logo">Easy<span>Accomod</span></h1>
            <nav>
                <ul>
                    <li><a class="menu" href="index.php">Trang chủ</a></li>
                    <li><a class="menu" href="#">Tìm kiếm nâng cao</a></li>
                    <li><a class="menu" href="#">Đăng nhập</a></li>
                </ul>
            </nav>
        </header>

        <main class="main">
            <div class="search_bar">
                <div class="form_input">
                    <input type="text" name="text" class="search_input" placeholder="Tìm kiếm">
                    <select class="place_select">
                        <option value="0">Thành phố</option>
                        <option value="1">Hà Nội</option>
                        <option value="2">Đà Nẵng</option>
                        <option value="3">TP Hồ Chí Minh</option>
                    </select>
                    <button type="summit" class="submit_button">Tìm kiếm</button>
                </div>
                
            </div>
        </main>

        <footer>

        </footer>

    </body>
</html>